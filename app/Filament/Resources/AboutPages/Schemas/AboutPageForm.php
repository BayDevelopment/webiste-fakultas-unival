<?php

namespace App\Filament\Resources\AboutPages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AboutPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Header / Breadcrumb')
                    ->description('Bagian judul halaman dan breadcrumb di atas.')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('breadcrumb_induk')
                                ->label('Breadcrumb: Beranda (Induk)')
                                ->placeholder('Contoh: Beranda')
                                ->maxLength(255),

                            TextInput::make('breadcrumb_aktif')
                                ->label('Breadcrumb: Tentang (Aktif)')
                                ->placeholder('Contoh: Tentang Kami')
                                ->maxLength(255),
                        ]),

                        Grid::make(2)->schema([
                            TextInput::make('judul_halaman')
                                ->label('Judul Halaman (H1)')
                                ->required()
                                ->maxLength(255)
                                ->live(debounce: 500) // biar langsung update saat ngetik
                                ->afterStateUpdated(
                                    fn(Set $set, ?string $state) =>
                                    $set('slug', Str::slug($state ?? ''))
                                ),

                            TextInput::make('slug')
                                ->label('Slug (Otomatis)')
                                ->readOnly()
                                ->required()
                                ->dehydrated()
                                ->hint(function (Get $get) {
                                    $slug = $get('slug');
                                    if (! $slug) return null;

                                    $exists = DB::table('header_tentang_kami')
                                        ->when($get('id'), fn($q) => $q->where('id', '!=', $get('id')))
                                        ->where('slug', $slug)
                                        ->exists();

                                    return $exists ? 'Slug sudah digunakan. Ubah Judul Halaman agar slug berbeda.' : null;
                                })
                                ->hintColor('danger')
                        ]),

                        TextInput::make('subjudul_halaman')
                            ->label('Subjudul Halaman (Subtitle)')
                            ->placeholder('Contoh: Mencetak talenta digital yang adaptif, berintegritas, dan siap bersaing di industri.')
                            ->maxLength(255),
                    ]),

                Section::make('Hero')
                    ->description('Bagian Hero: badge, judul, deskripsi, gambar, dan kartu float.')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('badge_hero')
                                ->label('Badge (Hero)')
                                ->placeholder('Contoh: Terakreditasi Kurikulum Industri')
                                ->maxLength(255),

                            TextInput::make('judul_hero')
                                ->label('Judul Utama (Hero)')
                                ->placeholder('Contoh: Belajar dengan kurikulum modern, berorientasi praktik, dan portofolio nyata.')
                                ->required()
                                ->maxLength(255),
                        ]),

                        Textarea::make('deskripsi_hero')
                            ->label('Deskripsi (Hero)')
                            ->placeholder('Contoh: Kami fokus pada pembelajaran berbasis proyek, kolaborasi komunitas, dan penguatan kompetensi...')
                            ->rows(4)
                            ->maxLength(2000),

                        Grid::make(2)->schema([
                            FileUpload::make('gambar_hero')
                                ->label('Gambar Hero')
                                ->helperText('Format PNG • Ukuran maksimal 1 MB')
                                ->image()
                                ->disk('public')
                                ->directory('tentang-kami/hero')
                                ->imageEditor()
                                ->acceptedFileTypes(['image/png'])
                                ->maxSize(1024)
                                ->rules(['mimes:png', 'max:1024'])
                                ->downloadable()
                                ->openable()
                                ->columnSpan(1),

                            Grid::make(1)->schema([
                                TextInput::make('judul_kartu_hero')
                                    ->label('Kartu Float: Judul (di atas gambar)')
                                    ->placeholder('Contoh: Learning That Matter')
                                    ->maxLength(255),

                                TextInput::make('subjudul_kartu_hero')
                                    ->label('Kartu Float: Subjudul (di atas gambar)')
                                    ->placeholder('Contoh: Skill, portofolio, dan mindset industri.')
                                    ->maxLength(255),
                            ])->columnSpan(1),
                        ]),
                    ]),

                Section::make('Publikasi')
                    ->schema([
                        Toggle::make('status_publikasi')
                            ->label('Tampilkan di Website')
                            ->helperText('Jika aktif, Header Tentang Kami tampil di website.')
                            ->default(true),
                    ]),
            ]);
    }
}
