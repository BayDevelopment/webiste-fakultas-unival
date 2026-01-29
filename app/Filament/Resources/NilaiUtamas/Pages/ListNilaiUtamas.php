<?php

namespace App\Filament\Resources\NilaiUtamas\Pages;

use App\Filament\Resources\NilaiUtamas\NilaiUtamaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListNilaiUtamas extends ListRecords
{
    protected static string $resource = NilaiUtamaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Nilai Utama')
                ->icon('heroicon-o-plus'),
        ];
    }
}
