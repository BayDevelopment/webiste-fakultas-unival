<?php

namespace App\Filament\Resources\Visis\Pages;

use App\Filament\Resources\Visis\VisiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVisis extends ListRecords
{
    protected static string $resource = VisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Visi')
                ->icon('heroicon-o-plus'),
        ];
    }
}
