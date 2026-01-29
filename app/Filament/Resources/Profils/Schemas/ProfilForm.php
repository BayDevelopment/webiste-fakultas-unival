<?php

namespace App\Filament\Resources\Profils\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class ProfilForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Konten Profil')
                    ->schema([
                        TextInput::make('judul')
                            ->label('Judul')
                            ->required()
                            ->placeholder('Profil Singkat')
                            ->maxLength(255)
                            ->live()
                            ->helperText(
                                fn(Get $get) =>
                                strlen($get('judul') ?? '') . ' / 255 karakter'
                            ),

                        TextInput::make('subjudul')
                            ->label('Subjudul')
                            ->placeholder('Siapa kita & apa yang kita kerjakan')
                            ->maxLength(255)
                            ->live()
                            ->helperText(
                                fn(Get $get) =>
                                strlen($get('subjudul') ?? '') . ' / 255 karakter'
                            ),

                        Textarea::make('title')
                            ->label('Title')
                            ->placeholder('Kami fokus pada pembelajaran berbasis proyek...')
                            ->rows(4)
                            ->required()
                            ->live()
                            ->helperText(
                                fn(Get $get) =>
                                strlen($get('title') ?? '') . ' karakter'
                            ),

                        TextInput::make('subjudul_link')
                            ->label('Subjudul Link')
                            ->placeholder('Teks atau judul link')
                            ->maxLength(255)
                            ->live()
                            ->helperText(
                                fn(Get $get) =>
                                strlen($get('subjudul_link') ?? '') . ' / 255 karakter'
                            ),

                        TextInput::make('subtitle_link')
                            ->label('Subtitle Link')
                            ->placeholder('Subtitle untuk link')
                            ->maxLength(255)
                            ->live()
                            ->helperText(
                                fn(Get $get) =>
                                strlen($get('subtitle_link') ?? '') . ' / 255 karakter'
                            ),

                        TextInput::make('subtext_link')
                            ->label('Subtext Link')
                            ->placeholder('Teks kecil pendukung link')
                            ->maxLength(150)
                            ->live()
                            ->helperText(
                                fn(Get $get) =>
                                strlen($get('subtext_link') ?? '') . ' / 150 karakter'
                            ),

                        Textarea::make('link')
                            ->label('Link')
                            ->placeholder('https://contoh.com/tujuan')
                            ->rows(2)
                            ->live()
                            ->helperText(
                                fn(Get $get) =>
                                strlen($get('link') ?? '') . ' karakter'
                            ),

                        Toggle::make('status_aktif')
                            ->label('Status Aktif')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }
}
