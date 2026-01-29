<?php

namespace App\Filament\Resources\OverviewStatistiks\Pages;

use App\Filament\Resources\OverviewStatistiks\OverviewStatistikResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOverviewStatistiks extends ListRecords
{
    protected static string $resource = OverviewStatistikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Overview Statistik')
                ->icon('heroicon-o-plus'),
        ];
    }
}
