<?php

namespace App\Filament\Resources\Keunggulans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class KeunggulanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Keunggulan')
                    ->description('Konten keunggulan yang ditampilkan sebagai chip.')
                    ->schema([
                        TextInput::make('judul')
                            ->label('Judul Keunggulan')
                            ->placeholder('Contoh: Project Based Learning')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('ikon')
                            ->label('Ikon (opsional)')
                            ->placeholder('Contoh: check')
                            ->helperText('Isi nama ikon jika digunakan oleh UI. Bisa dikosongkan.')
                            ->maxLength(50),

                        Toggle::make('status_aktif')
                            ->label('Tampilkan')
                            ->helperText('Jika aktif, keunggulan akan tampil di website.')
                            ->default(true),
                    ])
                    ->columns(1),
            ]);
    }
}
