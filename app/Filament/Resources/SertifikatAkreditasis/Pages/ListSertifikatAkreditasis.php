<?php

namespace App\Filament\Resources\SertifikatAkreditasis\Pages;

use App\Filament\Resources\SertifikatAkreditasis\SertifikatAkreditasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSertifikatAkreditasis extends ListRecords
{
    protected static string $resource = SertifikatAkreditasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Sertifikat Akreditasi')
                ->icon('heroicon-o-plus'),
        ];
    }
}
