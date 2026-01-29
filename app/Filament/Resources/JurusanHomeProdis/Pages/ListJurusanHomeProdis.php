<?php

namespace App\Filament\Resources\JurusanHomeProdis\Pages;

use App\Filament\Resources\JurusanHomeProdis\JurusanHomeProdiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListJurusanHomeProdis extends ListRecords
{
    protected static string $resource = JurusanHomeProdiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Prodi Home')
                ->icon('heroicon-o-plus'),
        ];
    }
}
