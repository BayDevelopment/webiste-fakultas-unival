<?php

namespace App\Filament\Resources\FormBimbingans\Pages;

use App\Filament\Resources\FormBimbingans\FormBimbinganResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormBimbingans extends ListRecords
{
    protected static string $resource = FormBimbinganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Form Bimbingan')
                ->icon('heroicon-o-plus'),
        ];
    }
}
