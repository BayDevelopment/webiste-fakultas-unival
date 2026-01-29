<?php

namespace App\Filament\Resources\OverviewStatistiks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class OverviewStatistikForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('icon')
                    ->label('Icon')
                    ->required()
                    ->maxLength(50)
                    ->placeholder('fa-solid fa-user-graduate')
                    ->helperText('Nama icon yang digunakan di tampilan statistik (maks. 50 karakter).'),

                TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->maxLength(100)
                    ->placeholder('Mahasiswa Aktif')
                    ->helperText('Judul yang ditampilkan pada website (maks. 100 karakter).'),

                TextInput::make('value')
                    ->label('Jumlah')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->placeholder('1200')
                    ->helperText('Masukkan angka total yang akan ditampilkan.'),

                Toggle::make('show_plus')
                    ->label('Tampilkan +')
                    ->default(true)
                    ->helperText('Jika aktif, angka akan ditampilkan dengan tanda + (contoh: 1200+).'),
            ]);
    }
}
