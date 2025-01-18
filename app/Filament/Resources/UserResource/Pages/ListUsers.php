<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Semua User')
                ->badge(User::count()),

            'verified' => Tab::make('Terverifikasi')
                ->modifyQueryUsing(fn (Builder $query) => $query
                    ->where('verification_status', 'verified'))
                ->badge(User::where('verification_status', 'verified')->count()),

            'pending' => Tab::make('Menunggu Verifikasi')
                ->modifyQueryUsing(fn (Builder $query) => $query
                    ->where('verification_status', 'pending'))
                ->badge(User::where('verification_status', 'pending')->count()),

            'unverified' => Tab::make('Belum Verifikasi')
                ->modifyQueryUsing(fn (Builder $query) => $query
                    ->where('verification_status', 'unverified'))
                ->badge(User::where('verification_status', 'unverified')->count()),

            'rejected' => Tab::make('Ditolak')
                ->modifyQueryUsing(fn (Builder $query) => $query
                    ->where('verification_status', 'rejected'))
                ->badge(User::where('verification_status', 'rejected')->count()),

                'Admin' => Tab::make('Administrator')
                ->modifyQueryUsing(fn (Builder $query) => $query
                    ->where('role', 'admin'))
                ->badge(User::where('role', 'admin')->count()),
        ];
    }

    public function getDefaultActiveTab(): string
    {
        return 'all';
    }
}
