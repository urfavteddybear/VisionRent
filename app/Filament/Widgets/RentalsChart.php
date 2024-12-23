<?php

namespace App\Filament\Widgets;

use App\Models\History;
use App\Models\Rental;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class RentalsChart extends ChartWidget
{
    protected static ?string $heading = 'Total Transactions';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = $this->getTransactionsPerMonth();
        return [
            'datasets' => [
                [
                    'label' => 'Ongoing',
                    'data' => $data['transactionsPerMonth'],
                    'backgroundColor' => '#f4ab33',
                    'borderColor' => '#f4ab33',
                    'borderWidth' => 1,
                ],
                [
                    'label' => 'Completed',
                    'data' => $data['completedPerMonth'],
                    'backgroundColor' => '#ec7176',
                    'borderColor' => '#ec7176',
                    'borderWidth' => 1,
                ]
                ],
            'labels' => $data['months']
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    private function getTransactionsPerMonth(): array
    {
        $now = Carbon::now();
        $transactionsPerMonth = [];
        $completedPerMonth = [];
        $months = collect(range(1, 12))->map(function ($month) use ($now, &$transactionsPerMonth, &$completedPerMonth) {
            // Count users for the given year and month
            $count = Rental::whereYear('created_at', $now->year)
            ->whereMonth('created_at', $month)
            ->where('status', 'rented')
            ->count();


            $transactionsPerMonth[] = $count;

            $count = History::whereYear('created_at', $now->year)
                         ->whereMonth('created_at', $month)
                         ->count();

            $completedPerMonth[] = $count;

            // Return the short month name (e.g., "Jan", "Feb")
            return Carbon::create($now->year, $month, 1)->format('M');
        })->toArray();

        return [
            'transactionsPerMonth' => $transactionsPerMonth,
            'completedPerMonth' => $completedPerMonth,
            'months' => $months,
        ];
    }
}

