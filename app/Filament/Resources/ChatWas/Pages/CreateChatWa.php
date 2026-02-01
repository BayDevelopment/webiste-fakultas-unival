<?php

namespace App\Filament\Resources\ChatWas\Pages;

use App\Filament\Resources\ChatWas\ChatWaResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateChatWa extends CreateRecord
{
    protected static string $resource = ChatWaResource::class;

    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Berhasil')
            ->body('ChatBot berhasil ditambahkan.')
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
