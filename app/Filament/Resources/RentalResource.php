<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RentalResource\Pages;
use App\Models\Rental;
use App\Models\History; // Import History model
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

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
                ->relationship('user', 'email') // Menggunakan email untuk dropdown
                ->searchable()
                ->required(),

            Forms\Components\Select::make('item_id')
                ->label('Barang')
                ->relationship('item', 'name') // Menggunakan nama item
                ->searchable()
                ->required(),

            Forms\Components\DatePicker::make('start_date')
                ->label('Tanggal Mulai')
                ->required(),

            Forms\Components\DatePicker::make('end_date')
                ->label('Tanggal Selesai')
                ->required(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
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
        ])
        ->actions([
            Tables\Actions\Action::make('return') // Action for "Barang Dikembalikan"
                ->label('Barang Dikembalikan')
                ->action(function (Rental $record) {
                    if ($record->status === 'returned') {
                        $this->notify('warning', 'Barang sudah dikembalikan sebelumnya.');
                        return;
                    }

                    // Calculate the overdue days if applicable
                    $returnDate = now();
                    $overdueDays = $returnDate->greaterThan($record->end_date)
                        ? $returnDate->diffInDays($record->end_date)
                        : 0;

                    // Calculate penalty percentage
                    $penaltyPercent = $record->item->penalty_percent ?? 0;

                    // Calculate penalty total
                    $penaltyTotal = $overdueDays * ($record->item->price * $penaltyPercent / 100);

                    // Calculate rental duration in days
                    $rentalDays = $record->start_date->diffInDays($record->end_date);

                    // Calculate the total cost of the rental (price * rental days + penalty)
                    $totalCost = ($rentalDays * $record->item->price) + $penaltyTotal;

                    // Create a History entry
                    History::create([
                        'user_id' => $record->user_id,
                        'item_id' => $record->item_id,
                        'start_date' => $record->start_date,
                        'end_date' => $record->end_date,
                        'return_date' => $returnDate,
                        'status' => 'returned',
                        'penalty_total' => $penaltyTotal,
                        'total_cost' => $totalCost,  // Save total cost here
                    ]);

                    // Increment stock of the item
                    $record->item->increment('stock');

                    // Delete rental record
                    $record->delete();

                    // Notify success
                    // $this->notify('success', 'Barang berhasil dikembalikan, dipindahkan ke riwayat, dan stok diperbarui.');
                })
                ->color('success')
                ->visible(fn (Rental $record) => $record->status === 'rented'),
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
