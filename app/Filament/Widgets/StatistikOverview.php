<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class StatistikOverview extends ChartWidget
{
    protected ?string $heading = 'Statistik Overview';

    protected function getData(): array
    {
        $rows = DB::table('overview_statistik')
            ->select('judul', 'value')
            ->orderByDesc('value')
            ->get();

        $values = $rows->pluck('value')->all();
        $labels = $rows->pluck('judul')->all();

        return [
            'datasets' => [
                [
                    'data' => $values,
                    'backgroundColor' => $this->generateColors(count($values)),
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    /**
     * Generate random HEX colors
     */
    protected function generateColors(int $count): array
    {
        return collect(range(1, $count))
            ->map(fn() => sprintf(
                '#%02X%02X%02X',
                rand(80, 220),  // R
                rand(80, 220),  // G
                rand(80, 220),  // B
            ))
            ->toArray();
    }
}
