<?php

namespace App\Filament\Resources\FormBimbingans\Pages;

use App\Filament\Resources\FormBimbingans\FormBimbinganResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateFormBimbingan extends CreateRecord
{
    protected static string $resource = FormBimbinganResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Berhasil')
            ->body('Form Bimbingan berhasil ditambahkan.')
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
