<?php

namespace App\Filament\Resources\TimPengelolas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TimPengelolaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Tim Pengelola')
                    ->schema([
                        TextInput::make('nama')
                            ->label('Nama')
                            ->placeholder('Dr. Nama Dosen')
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

                        Select::make('jenis_kelamin')
                            ->label('Jenis Kelamin')
                            ->options([
                                'L' => 'Laki-laki',
                                'P' => 'Perempuan',
                            ])
                            ->required()
                            ->native(false)
                            ->helperText('Pilih jenis kelamin untuk kebutuhan data & tampilan.'),

                        TextInput::make('jabatan')
                            ->label('Jabatan')
                            ->placeholder('Dekan')
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

                        FileUpload::make('foto')
                            ->label('Foto')
                            ->image()
                            ->disk('public')
                            ->directory('tim-pengelola')
                            ->visibility('public')
                            ->imageEditor()
                            ->maxSize(1024)
                            ->acceptedFileTypes(['image/jpeg'])
                            ->helperText('Upload foto JPG, maksimal 1 MB. Jika kosong, avatar default akan digunakan.')
                            ->columnSpanFull(),

                        Toggle::make('status_aktif')
                            ->label('Tampilkan di Halaman')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }
}
