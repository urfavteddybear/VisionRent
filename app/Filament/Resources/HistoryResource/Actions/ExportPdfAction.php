<?php

namespace App\Filament\Resources\HistoryResource\Actions;

use Filament\Tables\Actions\Action as TableAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ExportPdfAction extends TableAction
{
    public static function getDefaultName(): ?string
    {
        return 'exportPdf';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label('Export PDF')
            ->icon('heroicon-s-bars-arrow-down')
            ->form([
                Grid::make(2)
                    ->schema([
                        DatePicker::make('start_date')
                            ->label('Tanggal Mulai')
                            ->required(),
                        DatePicker::make('end_date')
                            ->label('Tanggal Akhir')
                            ->required(),
                    ]),
            ])
            ->action(function (array $data) {
                $histories = \App\Models\History::query()
                    ->with(['user', 'item'])
                    ->whereBetween('start_date', [
                        Carbon::parse($data['start_date']),
                        Carbon::parse($data['end_date']),
                    ])
                    ->get();

                $pdf = Pdf::loadView('pdf.history-report', [
                    'histories' => $histories,
                    'start_date' => $data['start_date'],
                    'end_date' => $data['end_date'],
                ]);

                $fileName = 'history-report-' . now()->format('Y-m-d') . '.pdf';

                return response()->streamDownload(function () use ($pdf) {
                    print($pdf->output());
                }, $fileName);
            });
    }
}
