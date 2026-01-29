<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

use function Laravel\Prompts\textarea;

class HeroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('badge_text')
                    ->label('Title Badge')
                    ->placeholder('Masukan badge title')
                    ->required(),
                TextInput::make('title')
                    ->label('Title')
                    ->placeholder('Masukan title')
                    ->required(),
                TextInput::make('subtitle')
                    ->label('SubTitle')
                    ->placeholder('Masukan SubTitle')
                    ->required(),
                Textarea::make('description')
                    ->label('Deskripsi')
                    ->placeholder('Masukkan deskripsi singkat hero section')
                    ->rows(3)
                    ->maxLength(255)
                    ->required(),
                FileUpload::make('hero_image')
                    ->label('Gambar Hero')
                    ->image()
                    ->disk('public') // 🔥 PENTING
                    ->directory('hero')
                    ->imageEditor()
                    ->imagePreviewHeight('250')
                    ->acceptedFileTypes(['image/png'])
                    ->maxSize(1024)
                    ->helperText('Format PNG, ukuran maksimal 1MB')
                    ->required(),

                TextInput::make('primary_button_label')
                    ->label('Label Tombol Utama')
                    ->placeholder('Contoh: Selengkapnya')
                    ->maxLength(50)
                    ->required(),

                TextInput::make('primary_button_url')
                    ->label('URL Tombol Utama')
                    ->placeholder('https://...')
                    ->url(),

                TextInput::make('secondary_button_label')
                    ->label('Label Tombol Kedua')
                    ->placeholder('Contoh: Daftar Sekarang')
                    ->maxLength(50)
                    ->required(),

                TextInput::make('secondary_button_url')
                    ->label('URL Tombol Kedua')
                    ->placeholder('https://...')
                    ->url(),

                Toggle::make('is_active')
                    ->label('Aktifkan Hero Section')
                    ->default(true),

                Section::make('Statistik')
                    ->columns(1)
                    ->schema([
                        TextInput::make('laboratory_count')
                            ->label('Jumlah Laboratorium')
                            ->numeric()
                            ->minValue(0)
                            ->default(0)
                            ->required(),

                        TextInput::make('lecturer_practitioner_count')
                            ->label('Dosen & Praktisi')
                            ->numeric()
                            ->minValue(0)
                            ->default(0)
                            ->required(),

                        TextInput::make('industry_partner_count')
                            ->label('Mitra Industri')
                            ->numeric()
                            ->minValue(0)
                            ->default(0)
                            ->required(),
                    ]),
            ]);
    }
}
