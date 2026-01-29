<?php

namespace App\Filament\Resources\HomeProdis\Pages;

use App\Filament\Resources\HomeProdis\HomeProdiResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeProdi extends CreateRecord
{
    protected static string $resource = HomeProdiResource::class;
    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Berhasil')
            ->body('Data Homeprodi berhasil ditambahkan.')
            ->success();
    }

    public function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()
                ->label('Create')
                ->icon('heroicon-o-plus'),
            $this->getCancelFormAction()
                ->label('Cancel')
                ->url($this->getResource()::getUrl('index'))
                ->icon('heroicon-o-x-mark')
        ];
    }
}
