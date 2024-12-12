<?php

namespace App\Filament\Widgets;

use App\Models\Item;
use App\Models\Rental;
use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use League\CommonMark\Extension\DescriptionList\Node\Description;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 2;



    protected function getStats(): array
    {
        function getUsersPerMonth(): array
        {
            $now = Carbon::now();
            return collect(range(1, 12))->map(function ($month) use ($now) {
                return User::whereYear('created_at', $now->year)
                        ->whereMonth('created_at', $month)
                        ->count();
            })->toArray();
        }

        function getRentalsPerMonth(): array
        {
            $now = Carbon::now();
            return collect(range(1, 12))->map(function ($month) use ($now) {
                return Rental::whereYear('start_date', $now->year)
                            ->whereMonth('start_date', $month)
                            ->where('status', 'rented')
                            ->count();
            })->toArray();
        }

        return [
            Stat::make('New Users', User::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count())
                ->description('Total new users this month')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart(getUsersPerMonth()),


            Stat::make('Total Items',Item::sum('stock')),


            Stat::make('Total Items Rented', Rental::where('status', 'rented')->count())
                ->description('Items currently rented')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart(getRentalsPerMonth()),
        ];
    }
}
