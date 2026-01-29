<?php

namespace App\Filament\Resources\JurusanHomeProdis\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class JurusanHomeProdiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Program Studi (Beranda)')
                    ->schema([
                        Select::make('jenjang')
                            ->label('Jenjang')
                            ->options([
                                'S1' => 'S1',
                                'D3' => 'D3',
                            ])
                            ->required()
                            ->native(false)
                            ->helperText('Badge yang tampil di kartu (contoh: S1 / D3).'),

                        TextInput::make('nama')
                            ->label('Nama Prodi')
                            ->placeholder('Teknik Informatika')
                            ->required()
                            ->maxLength(100)
                            ->live()
                            ->rule('max:100')
                            ->helperText(
                                fn($state) =>
                                strlen($state ?? '') > 100
                                    ? 'Melebihi batas maksimal 100 karakter'
                                    : strlen($state ?? '') . ' / 100 karakter'
                            )
                            ->hintColor(
                                fn($state) =>
                                strlen($state ?? '') > 100 ? 'danger' : 'gray'
                            ),

                        Textarea::make('deskripsi_singkat')
                            ->label('Deskripsi Singkat')
                            ->rows(2)
                            ->placeholder('Software engineering, cloud, AI, dan pengembangan produk digital.')
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

                        TagsInput::make('tags')
                            ->label('Tags (Chip)')
                            ->placeholder('Ketik lalu Enter…')
                            ->helperText('Contoh: Web, Mobile, Cloud')
                            ->nullable()
                            ->columnSpanFull(),

                        Toggle::make('status_aktif')
                            ->label('Tampilkan di Beranda')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }
}
