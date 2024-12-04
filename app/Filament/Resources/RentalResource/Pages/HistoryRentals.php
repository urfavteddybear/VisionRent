<?php

namespace App\Filament\Resources\RentalResource\Pages;

use App\Filament\Resources\RentalResource;
use Filament\Resources\Pages\Page;
use Filament\Tables;

class HistoryRentals extends Page
{
    protected static string $resource = RentalResource::class;
    protected static string $view = 'filament.resources.rental-resource.pages.history-rentals';

    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->resource::getModel()::query()->where('status', 'returned');
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('user.email')->label('Pelanggan'),
            Tables\Columns\TextColumn::make('item.name')->label('Barang'),
            Tables\Columns\TextColumn::make('start_date')->label('Tanggal Mulai'),
            Tables\Columns\TextColumn::make('end_date')->label('Tanggal Selesai'),
            Tables\Columns\TextColumn::make('status')->label('Status')->enum([
                'rented' => 'Dipinjam',
                'returned' => 'Dikembalikan',
            ]),
        ];
    }
}
