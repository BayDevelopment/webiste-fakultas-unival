<?php

namespace App\Filament\Resources\ChatWas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ChatWaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kontak')
                    ->icon('heroicon-o-user-circle') // 👤
                    ->schema([
                        TextInput::make('nama')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Nama lengkap'),

                        TextInput::make('jabatan')
                            ->maxLength(255)
                            ->placeholder('Jabatan / Posisi'),
                    ])
                    ->columns(2),

                Section::make('WhatsApp')
                    ->icon('heroicon-o-chat-bubble-left-right') // 💬
                    ->schema([
                        TextInput::make('no_whatsapp')
                            ->label('No WhatsApp')
                            ->tel()
                            ->required()
                            ->placeholder('628xxxxxxxxxx')
                            ->helperText('Nomor harus diawali 62 (tanpa +)')
                            ->regex('/^62[0-9]{8,13}$/')
                            ->validationMessages([
                                'regex' => 'Nomor WhatsApp harus diawali 62 dan hanya angka',
                            ]),
                    ]),

                Section::make('Status')
                    ->icon('heroicon-o-power') // ⚡
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ]),
            ]);
    }
}
