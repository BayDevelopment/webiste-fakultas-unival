<?php

namespace App\Filament\Resources\ChatWas\Pages;

use App\Filament\Resources\ChatWas\ChatWaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListChatWas extends ListRecords
{
    protected static string $resource = ChatWaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('ChatBot')
                ->icon('heroicon-o-plus'),
        ];
    }
}
