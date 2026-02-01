<?php

namespace App\Filament\Resources\SertifikatAkreditasis\Pages;

use App\Filament\Resources\SertifikatAkreditasis\SertifikatAkreditasiResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateSertifikatAkreditasi extends CreateRecord
{
    protected static string $resource = SertifikatAkreditasiResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Berhasil')
            ->body('Sertifikat Akreditasi berhasil ditambahkan.')
            ->success();
    }

    public function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()
                ->label('Create')
                ->icon('heroicon-o-plus'),
            $this->getCreateAnotherFormAction()
                ->label('Create & Another Create')
                ->icon('heroicon-o-arrow-path-rounded-square'),
            $this->getCancelFormAction()
                ->label('Cancel')
                ->url($this->getResource()::getUrl('index'))
                ->icon('heroicon-o-x-mark')
        ];
    }
}
