<?php

namespace App\Filament\Resources\Kuisioners\Pages;

use App\Filament\Resources\Kuisioners\KuisionerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKuisioners extends ListRecords
{
    protected static string $resource = KuisionerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Kuisioner')
                ->icon('heroicon-o-plus'),
        ];
    }
}
