<?php

namespace App\Filament\Widgets;

use App\Models\HeroSectionModel;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class HeroSectionStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        // ambil 1 record (sesuaikan: misal is_active)
        $hero = HeroSectionModel::query()->latest()->first();

        return [
            Stat::make('Laboratory', (int) ($hero?->laboratory_count ?? 0)),
            Stat::make('Lecturer Practitioner', (int) ($hero?->lecturer_practitioner_count ?? 0)),
            Stat::make('Industry Partner', (int) ($hero?->industry_partner_count ?? 0)),
        ];
    }
}
