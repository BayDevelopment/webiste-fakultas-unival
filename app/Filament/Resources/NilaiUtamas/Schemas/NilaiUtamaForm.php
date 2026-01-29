<?php

namespace App\Filament\Resources\NilaiUtamas\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class NilaiUtamaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Nilai Utama')
                    ->schema([
                        TextInput::make('judul')
                            ->label('Judul')
                            ->placeholder('Inovasi')
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

                        Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->rows(3)
                            ->placeholder('Berpikir kreatif dan membangun solusi nyata.')
                            ->required()
                            ->maxLength(255)
                            ->live()
                            ->rule('max:255')
                            ->helperText(
                                fn($state) =>
                                strlen($state ?? '') > 255
                                    ? 'Melebihi batas maksimal 255 karakter'
                                    : strlen($state ?? '') . ' / 255 karakter'
                            )
                            ->hintColor(
                                fn($state) =>
                                strlen($state ?? '') > 255 ? 'danger' : 'gray'
                            )
                            ->columnSpanFull(),

                        TextInput::make('icon')
                            ->label('Icon (Font-Awesome)')
                            ->placeholder('heroicon-o-light-bulb')
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

                        Toggle::make('status_aktif')
                            ->label('Tampilkan di Halaman')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }
}
