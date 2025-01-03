<?php

namespace App\Filament\Widgets;

use App\Models\History;
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

        function calculateMonthlyIncome(): string
        {
            $currentYear = Carbon::now()->year;
            $currentMonth = Carbon::now()->month;

            // Calculate income from Rentals (each rental represents a single item)
            $rentalIncome = Rental::where('status', 'rented')
                ->whereYear('start_date', $currentYear)
                ->whereMonth('start_date', $currentMonth)
                ->get()
                ->sum(function ($rental) {
                    $daysRented = $rental->start_date->diffInDays($rental->end_date); // Calculate number of days rented
                    return $rental->item->price * $daysRented;  // Multiply price by days rented
                });

            // Calculate income from History (each history entry represents a single item)
            $historyIncome = History::whereYear('start_date', $currentYear)
                ->whereMonth('start_date', $currentMonth)
                ->get()
                ->sum(function ($history) {
                    $daysRented = $history->start_date->diffInDays($history->end_date); // Calculate number of days rented
                    return $history->item->price * $daysRented;  // Multiply price by days rented
                });

            // Calculate penalty from History (each history entry can have a penalty)
            $penaltyIncome = History::whereYear('start_date', $currentYear)
                ->whereMonth('start_date', $currentMonth)
                ->get()
                ->sum('penalty_total');

            // Total income in Rupiah format
            $totalIncome = $rentalIncome + $historyIncome + $penaltyIncome;

            // Format the income in Rupiah with commas for thousands
            return 'Rp ' . number_format($totalIncome, 0, ',', '.');
        }


        return [
            Stat::make('New Users', User::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count())
                ->description('Total new users this month')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart(getUsersPerMonth()),


                Stat::make('Total Income', calculateMonthlyIncome())
                ->description('Total income this month')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('primary'),


            Stat::make('Total Items Rented', Rental::where('status', 'rented')->count())
                ->description('Items currently rented')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart(getRentalsPerMonth()),
        ];
    }
}
