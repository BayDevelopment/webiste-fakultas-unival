<?php

namespace App\Filament\Resources\Kegiatans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class KegiatanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kegiatan')
                    ->schema([
                        // COVER IMAGE
                        FileUpload::make('cover_image')
                            ->label('Cover Image')
                            ->image()
                            ->directory('activities')
                            ->imagePreviewHeight('200')
                            ->acceptedFileTypes(['image/jpeg'])
                            ->maxSize(1024) // 1 MB
                            ->helperText('Format JPG, maksimal 1MB')
                            ->nullable(),

                        // TYPE
                        Select::make('type')
                            ->label('Jenis Kegiatan')
                            ->options([
                                'Seminar' => 'Seminar',
                                'Kompetisi' => 'Kompetisi',
                                'Workshop' => 'Workshop',
                            ])
                            ->required()
                            ->native(false),

                        // DATE
                        DatePicker::make('activity_date')
                            ->label('Tanggal Kegiatan')
                            ->required()
                            ->closeOnDateSelection(),

                        // TITLE
                        TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(150)
                            ->placeholder('Contoh: Roadmap Karier Data & AI'),

                        // EXCERPT
                        Textarea::make('excerpt')
                            ->label('Deskripsi Singkat')
                            ->rows(3)
                            ->maxLength(255)
                            ->nullable(),

                        // STATUS
                        Toggle::make('status_aktif')
                            ->label('Status Aktif')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }
}
