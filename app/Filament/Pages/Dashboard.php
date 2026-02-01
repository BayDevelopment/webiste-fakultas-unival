<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected string $view = 'filament.pages.dashboard';
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-squares-2x2';

    protected function getHeaderWidgets(): array
    {
        return [
            \App\Filament\Widgets\HeroSectionStats::class,
            \App\Filament\Widgets\ProdiChart::class,
            \App\Filament\Widgets\StatistikOverview::class,
        ];
    }
}
