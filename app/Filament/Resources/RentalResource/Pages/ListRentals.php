<?php

namespace App\Filament\Resources\RentalResource\Pages;

use App\Filament\Resources\RentalResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use App\Models\Rental;

class ListRentals extends ListRecords
{
    protected static string $resource = RentalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Actions\Action::make('returned')
                ->label('Barang Dikembalikan')
                ->action(function (Rental $record) {
                    if ($record->status === 'returned') {
                        $this->notify('warning', 'Barang sudah dikembalikan sebelumnya.');
                        return;
                    }
                    $record->returnItem();
                    $this->notify('success', 'Barang berhasil dikembalikan dan stok diperbarui.');
                })
                ->color('success')
                ->visible(fn (Rental $record) => $record->status === 'rented')
                ->requiresConfirmation(),
        ];
    }
}

