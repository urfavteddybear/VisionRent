<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Rental;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use App\Models\History;
use App\Filament\Resources\RentalResource\Pages;

class RentalResource extends Resource
{
    protected static ?string $model = Rental::class;

    protected static ?string $navigationGroup = "Transactions";
    protected static ?string $navigationIcon = 'heroicon-o-calendar-date-range';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Select::make('user_id')
                ->label('Pelanggan')
                ->relationship('user', 'email')
                ->searchable()
                ->required(),

            Forms\Components\Select::make('item_id')
                ->label('Barang')
                ->relationship('item', 'name')
                ->searchable()
                ->required(),

            Forms\Components\DatePicker::make('start_date')
                ->label('Tanggal Mulai')
                ->required(),

            Forms\Components\DatePicker::make('end_date')
                ->label('Tanggal Selesai')
                ->required(),


            Forms\Components\TextInput::make('dp')
                ->label('Uang Muka')
                ->prefix('Rp')
                ->extraAttributes(['min' => 0])
                ->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.email')
                    ->label('Pelanggan')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('item.name')
                    ->label('Barang')
                    ->sortable(),

                Tables\Columns\TextColumn::make('start_date')
                    ->label('Tanggal Mulai')
                    ->sortable(),

                Tables\Columns\TextColumn::make('end_date')
                    ->label('Tanggal Selesai')
                    ->sortable(),

                Tables\Columns\TextColumn::make('dp')
                ->label('Uang Muka')
                ->money('IDR', true),
            ])
            ->actions([
                Tables\Actions\Action::make('return')
                    ->label('Barang Dikembalikan')
                    ->action(function (Rental $record) {
                        if ($record->status === 'returned') {
                            Notification::make()
                                ->warning()
                                ->title('Barang sudah dikembalikan sebelumnya.')
                                ->send();
                            return;
                        }

                        $returnDate = now();
                        $overdueDays = $returnDate->greaterThan($record->end_date)
                            ? $returnDate->diffInDays($record->end_date)
                            : 0;

                        $penaltyPercent = $record->item->penalty_percent ?? 0;
                        $penaltyTotal = $overdueDays * ($record->item->price * $penaltyPercent / 100);
                        $rentalDays = $record->start_date->diffInDays($record->end_date);
                        $totalCost = ($rentalDays * $record->item->price) + $penaltyTotal;

                        History::create([
                            'user_id' => $record->user_id,
                            'item_id' => $record->item_id,
                            'start_date' => $record->start_date,
                            'end_date' => $record->end_date,
                            'return_date' => $returnDate,
                            'status' => 'returned',
                            'dp'=> $record->dp,
                            'penalty_total' => $penaltyTotal,
                            'total_cost' => $totalCost,
                        ]);

                        $record->item->increment('stock');
                        $record->delete();

                        Notification::make()
                            ->success()
                            ->title('Barang berhasil dikembalikan')
                            ->send();
                    })
                    ->color('success')
                    ->visible(fn (Rental $record) => $record->status === 'rented'),
            ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('generateInvoices')
                    ->label('Generate Invoices')
                    ->action(function (Collection $records) {
                        try {
                            $directory = 'invoices';
                            if (!Storage::exists($directory)) {
                                Storage::makeDirectory($directory);
                            }

                            $groupedRentals = $records->groupBy('user_id');

                            foreach ($groupedRentals as $userId => $userRentals) {
                                $user = $userRentals->first()->user;

                                $pdf = Pdf::loadView('invoices.rental', [
                                    'rentals' => $userRentals,
                                    'user' => $user,
                                    'totalAmount' => $userRentals->sum(function ($rental) {
                                        return $rental->item->price * $rental->start_date->diffInDays($rental->end_date);
                                    }),
                                ]);

                                $filename = "invoice-{$userId}-" . time() . ".pdf";
                                $filePath = Storage::path($directory . '/' . $filename);

                                $pdf->save($filePath);

                                Mail::send('emails.invoice', ['user' => $user], function ($message) use ($user, $filePath) {
                                    $message->to($user->email)
                                        ->subject('Invoice Rental')
                                        ->attach($filePath);
                                });

                                if (file_exists($filePath)) {
                                    unlink($filePath);
                                }
                            }

                            Notification::make()
                                ->success()
                                ->title('Invoice berhasil dibuat dan dikirim')
                                ->send();

                        } catch (\Exception $e) {
                            Notification::make()
                                ->danger()
                                ->title('Error membuat invoice')
                                ->body($e->getMessage())
                                ->send();
                        }
                    })
                    ->deselectRecordsAfterCompletion()
                    ->color('success')
                    ->icon('heroicon-o-document-text')
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRentals::route('/'),
            'create' => Pages\CreateRental::route('/create'),
            'edit' => Pages\EditRental::route('/{record}/edit'),
        ];
    }
}
