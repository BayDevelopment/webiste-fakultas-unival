<?php

namespace App\Filament\Resources\HomeProdis\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HomeProdiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Utama')
                    ->schema([
                        TextInput::make('judul')
                            ->label('Judul')
                            ->placeholder('Tentang Kami')
                            ->required()
                            ->maxLength(50)
                            ->live()
                            ->rule('max:50')
                            ->helperText(
                                fn($state) =>
                                strlen($state ?? '') > 50
                                    ? 'Melebihi batas maksimal 50 karakter'
                                    : strlen($state ?? '') . ' / 50 karakter'
                            )
                            ->hintColor(
                                fn($state) =>
                                strlen($state ?? '') > 50 ? 'danger' : 'gray'
                            ),

                        Textarea::make('title')
                            ->label('Title')
                            ->rows(3)
                            ->placeholder('Pilih jalur sesuai minat & karier masa depanmu.')
                            ->maxLength(150)
                            ->live()
                            ->rule('max:150')
                            ->helperText(
                                fn($state) =>
                                strlen($state ?? '') > 150
                                    ? 'Melebihi batas maksimal 150 karakter'
                                    : strlen($state ?? '') . ' / 150 karakter'
                            )
                            ->hintColor(
                                fn($state) =>
                                strlen($state ?? '') > 150 ? 'danger' : 'gray'
                            ),

                        Toggle::make('status_aktif')
                            ->label('Aktifkan di Beranda')
                            ->default(true),
                    ])
                    ->columns(2),

                Section::make('Link & Icon')
                    ->schema([
                        TextInput::make('icon')
                            ->label('Icon')
                            ->placeholder('icon font-awesome')
                            ->maxLength(50)
                            ->live()
                            ->rule('max:50')
                            ->helperText(
                                fn($state) =>
                                strlen($state ?? '') > 50
                                    ? 'Melebihi batas maksimal 50 karakter'
                                    : strlen($state ?? '') . ' / 50 karakter'
                            )
                            ->hintColor(
                                fn($state) =>
                                strlen($state ?? '') > 50 ? 'danger' : 'gray'
                            ),

                        TextInput::make('subtitle_link')
                            ->label('Teks Link')
                            ->placeholder('Selengkapnya')
                            ->maxLength(50)
                            ->live()
                            ->rule('max:50')
                            ->helperText(
                                fn($state) =>
                                strlen($state ?? '') > 50
                                    ? 'Melebihi batas maksimal 50 karakter'
                                    : strlen($state ?? '') . ' / 50 karakter'
                            )
                            ->hintColor(
                                fn($state) =>
                                strlen($state ?? '') > 50 ? 'danger' : 'gray'
                            ),

                        // `link` di DB adalah TEXT, jadi tidak perlu maxLength DB.
                        // Tapi tetap bagus dibatasi agar UX aman (mis. URL panjang).
                        TextInput::make('link')
                            ->label('URL Link')
                            ->placeholder('contoh: https://.....')
                            ->url()
                            ->live()
                            ->rule('max:2048')
                            ->helperText(
                                fn($state) =>
                                strlen($state ?? '') > 2048
                                    ? 'Melebihi batas maksimal 2048 karakter'
                                    : strlen($state ?? '') . ' / 2048 karakter'
                            )
                            ->hintColor(
                                fn($state) =>
                                strlen($state ?? '') > 2048 ? 'danger' : 'gray'
                            )
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
