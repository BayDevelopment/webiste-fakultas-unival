<?php

namespace App\Filament\Resources\FormSidangs\Pages;

use App\Filament\Resources\FormSidangs\FormSidangResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormSidangs extends ListRecords
{
    protected static string $resource = FormSidangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Form Sidang')
                ->icon('heroicon-o-plus'),
        ];
    }
}
