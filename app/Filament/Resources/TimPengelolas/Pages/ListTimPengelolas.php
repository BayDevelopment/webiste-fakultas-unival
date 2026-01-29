<?php

namespace App\Filament\Resources\TimPengelolas\Pages;

use App\Filament\Resources\TimPengelolas\TimPengelolaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTimPengelolas extends ListRecords
{
    protected static string $resource = TimPengelolaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tim Pengelola')
                ->icon('heroicon-o-plus'),
        ];
    }
}
