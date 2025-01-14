<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HistoryResource\Actions\ExportPdfAction;
use App\Filament\Resources\HistoryResource\Pages;
use App\Models\History;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Collection;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;

class HistoryResource extends Resource
{
    protected static ?string $model = History::class;

    protected static ?string $navigationGroup = "Transactions";

    protected static ?string $navigationIcon = 'heroicon-s-bars-arrow-down';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('user_id')
                ->label('Pelanggan')
                ->relationship('user', 'email')
                ->searchable()
                ->required()
                ->disabled(),

            Forms\Components\Select::make('item_id')
                ->label('Barang')
                ->relationship('item', 'name')
                ->searchable()
                ->required()
                ->disabled(),

            Forms\Components\DatePicker::make('start_date')
                ->label('Tanggal Mulai')
                ->required()
                ->disabled(),

            Forms\Components\DatePicker::make('end_date')
                ->label('Tanggal Selesai')
                ->required()
                ->disabled(),

            Forms\Components\DatePicker::make('return_date')
                ->label('Tanggal Pengembalian')
                ->required()
                ->disabled(),

            Forms\Components\TextInput::make('penalty_total')
                ->label('Total Penalti')
                ->numeric()
                ->prefix('IDR')
                ->disabled(),

            Forms\Components\TextInput::make('dp')
                ->label('Uang Muka')
                ->numeric()
                ->prefix('IDR')
                ->disabled(),

                Forms\Components\TextInput::make('total_cost')
                ->label('Total Biaya')
                ->numeric()
                ->prefix('IDR')
                ->disabled(),
        ]);
    }

    public static function table(Table $table): Table
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

                Tables\Columns\TextColumn::make('return_date')
                    ->label('Tanggal Pengembalian')
                    ->sortable(),

                Tables\Columns\TextColumn::make('penalty_total')
                    ->label('Total Penalti')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('dp')
                    ->label('Uang Muka')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('total_cost')
                    ->label('Total Biaya')
                    ->money('IDR')
                    ->sortable(),
            ])
            ->headerActions([
                ExportPdfAction::make(),
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

                            $groupedHistories = $records->groupBy('user_id');

                            foreach ($groupedHistories as $userId => $userHistories) {
                                $user = $userHistories->first()->user;

                                $pdf = Pdf::loadView('invoices.history', [
                                    'histories' => $userHistories,
                                    'user' => $user,
                                    'totalAmount' => $userHistories->sum('total_cost'),
                                    'totalPenalty' => $userHistories->sum('penalty_total'),
                                ]);

                                $filename = "invoice-completed-{$userId}-" . time() . ".pdf";
                                $filePath = Storage::path($directory . '/' . $filename);

                                $pdf->save($filePath);

                                Mail::send('emails.history-invoice', ['user' => $user], function ($message) use ($user, $filePath) {
                                    $message->to($user->email)
                                        ->subject('Invoice Rental (Transaksi Selesai)')
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
            'index' => Pages\ListHistories::route('/'),
            'create' => Pages\CreateHistory::route('/create'),
            'edit' => Pages\EditHistory::route('/{record}/edit'),
        ];
    }
}
