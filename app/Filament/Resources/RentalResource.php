<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RentalResource\Pages;
use App\Filament\Resources\RentalResource\RelationManagers;
use App\Models\Rental;
use App\Models\History; // Import model History
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Actions\Action;  // Pastikan Action diimport
use Filament\Actions; // Import Actions
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RentalResource extends Resource
{
    protected static ?string $model = Rental::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Select::make('user_id')
                ->label('Pelanggan')
                ->relationship('user', 'email') // Menggunakan email untuk dropdown
                ->searchable() // Membuat dropdown searchable
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
        ->actions([  // Definisikan tindakan tombol di setiap baris
            Tables\Actions\Action::make('return')  // Tombol "Barang Dikembalikan"
                ->label('Barang Dikembalikan')
                ->action(function (Rental $record) {
                    if ($record->status === 'returned') {
                        $this->notify('warning', 'Barang sudah dikembalikan sebelumnya.');
                        return;
                    }

                    // Memindahkan data ke History
                    History::create([
                        'user_id' => $record->user_id,
                        'item_id' => $record->item_id,
                        'start_date' => $record->start_date,
                        'end_date' => $record->end_date,
                        'status' => 'returned',
                    ]);

                    // Kembalikan stok barang
                    $item = $record->item;
                    $item->increment('stock');

                    // Hapus rental dari tabel
                    $record->delete();

                    // Notifikasi untuk memberitahukan bahwa barang telah dikembalikan, dipindahkan ke history, dan stok diperbarui
                    //Action::message('success', 'Barang berhasil dikembalikan, dipindahkan ke riwayat, dan stok diperbarui.');
                })
                ->color('success')
                ->visible(fn (Rental $record) => $record->status === 'rented')  // Tombol hanya muncul jika status 'rented'
        ]);
    }

    public static function getRelations(): array
    {
        return [
            // Menambahkan relasi jika perlu
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRentals::route('/'),
            'create' => Pages\CreateRental::route('/create'),
            'edit' => Pages\EditRental::route('/{record}/edit'),
            'history' => Pages\HistoryRentals::route('/history'),
        ];
    }
}
