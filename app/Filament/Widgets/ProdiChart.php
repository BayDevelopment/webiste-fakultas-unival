<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ProdiChart extends ChartWidget
{
    protected ?string $heading = 'Data per Program Studi';

    protected function getData(): array
    {

        $data = DB::table('program_studi')
            ->select('nama_program_studi', 'jumlah_mitra_industri')
            ->orderByDesc('jumlah_mitra_industri')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Mitra',
                    'data' => $data->pluck('jumlah_mitra_industri')->all(),
                ],
            ],
            'labels' => $data->pluck('nama_program_studi')->all(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
