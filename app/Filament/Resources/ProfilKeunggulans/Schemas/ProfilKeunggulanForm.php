<?php

namespace App\Filament\Resources\ProfilKeunggulans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class ProfilKeunggulanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Utama')
                    ->schema([
                        TextInput::make('icon')
                            ->label('Icon Judul')
                            ->required()
                            ->placeholder('Contoh: fa-solid fa-people-group')
                            ->maxLength(50)
                            ->live()
                            ->helperText(
                                fn(Get $get) =>
                                strlen($get('icon') ?? '') . ' / 50 karakter'
                            ),
                        TextInput::make('judul')
                            ->label('Judul')
                            ->required()
                            ->placeholder('Contoh: Kompetitif')
                            ->maxLength(255)
                            ->live()
                            ->helperText(
                                fn(Get $get) =>
                                strlen($get('judul') ?? '') . ' / 255 karakter'
                            ),

                        Toggle::make('status_aktif')
                            ->label('Status Aktif')
                            ->default(true)
                            ->helperText('Aktifkan untuk menampilkan item ini di halaman publik'),
                    ])
                    ->columns(1),
            ]);
    }
}
