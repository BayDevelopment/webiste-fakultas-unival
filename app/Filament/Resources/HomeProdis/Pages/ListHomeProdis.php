<?php

namespace App\Filament\Resources\HomeProdis\Pages;

use App\Filament\Resources\HomeProdis\HomeProdiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeProdis extends ListRecords
{
    protected static string $resource = HomeProdiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Homeprodi')
                ->icon('heroicon-o-plus'),
        ];
    }
}
