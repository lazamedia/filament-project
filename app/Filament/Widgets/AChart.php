<?php

namespace App\Filament\Widgets;

use App\Models\Anggota;
use Filament\Widgets\ChartWidget;

class AChart extends ChartWidget
{
    // protected static ?string $heading = 'Anggota Status Distribution';

    protected function getData(): array
    {
        $statusCounts = Anggota::selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        return [
            'labels' => ['Anggota', 'Pengurus', 'Alumni', 'Tidak Aktif'], 
            'datasets' => [
                [
                    'label' => 'Anggota Status',
                    'data' => [
                        $statusCounts['anggota'] ?? 0,
                        $statusCounts['pengurus'] ?? 0,
                        $statusCounts['alumni'] ?? 0,
                        $statusCounts['tidak aktif'] ?? 0,
                    ], 
                    'backgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56', '#FF5733'],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
