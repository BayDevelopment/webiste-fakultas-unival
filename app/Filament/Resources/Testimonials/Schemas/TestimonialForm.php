<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('avatar')
                    ->label('Foto Profil')
                    ->image()
                    ->imageEditor() // opsional, boleh dihapus
                    ->directory('testimonials')
                    ->imagePreviewHeight('120')
                    ->acceptedFileTypes(['image/jpeg'])
                    ->maxSize(1024) // 1 MB
                    ->nullable(),

                TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),

                TextInput::make('angkatan')
                    ->label('Angkatan')
                    ->numeric()
                    ->minValue(2000)
                    ->maxValue(date('Y'))
                    ->required()
                    ->maxLength(4),

                TextInput::make('program_studi')
                    ->label('Program Studi')
                    ->required()
                    ->maxLength(255),

                Textarea::make('quote')
                    ->label('Testimoni')
                    ->required()
                    ->rows(4)
                    ->maxLength(1000)
                    ->columnSpanFull(),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }
}
