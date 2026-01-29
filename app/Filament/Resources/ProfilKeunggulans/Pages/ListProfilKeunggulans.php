<?php

namespace App\Filament\Resources\ProfilKeunggulans\Pages;

use App\Filament\Resources\ProfilKeunggulans\ProfilKeunggulanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProfilKeunggulans extends ListRecords
{
    protected static string $resource = ProfilKeunggulanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Keunggulan Profil')
                ->icon('heroicon-o-plus'),
        ];
    }
}
