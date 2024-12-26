<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class UsersChart extends ChartWidget
{
    protected static ?string $heading = 'Total Users';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = $this->getUsersPerMonth();
        return [
            'datasets' => [
                [
                    'label' => 'Users',
                    'data' => $data['usersPerMonth']
                ]
                ],
            'labels' => $data['months']
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    private function getUsersPerMonth(): array
    {
        $now = Carbon::now();
        $usersPerMonth = [];
        $months = collect(range(1, 12))->map(function ($month) use ($now, &$usersPerMonth) {
            // Count users for the given year and month
            $count = User::whereYear('created_at', $now->year)
                         ->whereMonth('created_at', $month)
                         ->count();

            $usersPerMonth[] = $count;

            // Return the short month name (e.g., "Jan", "Feb")
            return Carbon::create($now->year, $month, 1)->format('M');
        })->toArray();

        return [
            'usersPerMonth' => $usersPerMonth,
            'months' => $months,
        ];
    }


}

