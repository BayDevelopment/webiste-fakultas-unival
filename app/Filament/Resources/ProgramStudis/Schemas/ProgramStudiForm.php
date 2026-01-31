<?php

namespace App\Filament\Resources\ProgramStudis\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProgramStudiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // ===============================
                // IDENTITAS PROGRAM STUDI
                // ===============================
                Section::make('Identitas Program Studi')
                    ->icon('heroicon-o-academic-cap')
                    ->schema([
                        TextInput::make('nama_program_studi')
                            ->label('Nama Program Studi')
                            ->placeholder('Contoh: Teknik Informatika')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Set $set, ?string $state) {
                                $set('slug', Str::slug($state ?? ''));
                            })
                            ->helperText('Nama resmi yang tampil di website.'),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->placeholder('contoh: teknik-informatika')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->disabled()
                            ->dehydrated()
                            ->helperText('Otomatis dibuat dari Nama Program Studi.'),

                        TextInput::make('jenjang')
                            ->label('Jenjang')
                            ->placeholder('Contoh: S1 / S2 / D3')
                            ->required()
                            ->helperText('Isi jenjang sesuai ketentuan kampus.'),
                    ])
                    ->columns(3),

                // ===============================
                // HEADLINE & RINGKASAN
                // ===============================
                Section::make('Headline & Ringkasan')
                    ->icon('heroicon-o-megaphone')
                    ->schema([
                        Textarea::make('headline')
                            ->label('Headline')
                            ->placeholder('Contoh: Belajar praktikal, bangun portofolio, siap masuk industri.')
                            ->required()
                            ->rows(2),

                        Textarea::make('subheadline')
                            ->label('Subheadline')
                            ->placeholder('Contoh: Fokus pada pemrograman, data, cloud, dan praktik pengembangan software modern.')
                            ->rows(2),

                        Textarea::make('ringkas_program_studi')
                            ->label('Ringkasan Program Studi')
                            ->placeholder('Contoh: Program studi yang menyiapkan lulusan kompeten di bidang rekayasa perangkat lunak dan teknologi informasi...')
                            ->rows(3)
                            ->helperText('Ringkasan singkat yang bisa dipakai untuk kartu/preview.'),
                    ]),

                // ===============================
                // HERO SECTION
                // ===============================
                Section::make('Hero Section')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        FileUpload::make('gambar_hero')
                            ->label('Gambar Hero')
                            ->image()
                            ->imagePreviewHeight('200')
                            ->directory('program-studi/hero')
                            ->acceptedFileTypes(['image/jpeg'])
                            ->maxSize(1024) // KB → 1MB
                            ->helperText('Format JPG/JPEG, maksimal 1 MB. Rekomendasi rasio 16:9.'),

                        TextInput::make('judul_caption')
                            ->label('Judul Caption')
                            ->placeholder('Contoh: Learning that matters'),

                        TextInput::make('teks_caption')
                            ->label('Teks Caption')
                            ->placeholder('Contoh: Praktik langsung dengan proyek nyata dan bimbingan dosen.'),
                    ])
                    ->columns(3),

                // ===============================
                // CTA
                // ===============================
                Section::make('Call To Action')
                    ->icon('heroicon-o-cursor-arrow-rays')
                    ->schema([
                        TextInput::make('url_lihat_dosen')
                            ->label('Link Lihat Dosen')
                            ->placeholder('Contoh: https://kampus.ac.id/... atau #dosen')
                            ->helperText('Boleh URL penuh atau anchor seperti #dosen')
                            ->rule(function () {
                                return function (string $attribute, $value, $fail) {
                                    if (blank($value)) return;

                                    $isAnchor = is_string($value) && str_starts_with($value, '#');
                                    $isUrl = filter_var($value, FILTER_VALIDATE_URL);

                                    if (! $isAnchor && ! $isUrl) {
                                        $fail('Format link harus URL valid atau anchor seperti #dosen.');
                                    }
                                };
                            }),

                        TextInput::make('url_daftar')
                            ->label('Link Daftar')
                            ->placeholder('Contoh: https://pmb.kampus.ac.id/daftar atau #daftar')
                            ->helperText('Boleh URL penuh atau anchor seperti #daftar')
                            ->rule(function () {
                                return function (string $attribute, $value, $fail) {
                                    if (blank($value)) return;

                                    $isAnchor = is_string($value) && str_starts_with($value, '#');
                                    $isUrl = filter_var($value, FILTER_VALIDATE_URL);

                                    if (! $isAnchor && ! $isUrl) {
                                        $fail('Format link harus URL valid atau anchor seperti #daftar.');
                                    }
                                };
                            }),

                    ])
                    ->columns(2),

                // ===============================
                // STATISTIK RINGKAS
                // ===============================
                Section::make('Statistik Ringkas')
                    ->icon('heroicon-o-chart-bar')
                    ->schema([
                        TextInput::make('jumlah_mata_kuliah_inti')
                            ->label('Jumlah Mata Kuliah Inti')
                            ->placeholder('Contoh: 24')
                            ->numeric()
                            ->helperText('Isi angka saja.'),

                        TextInput::make('jumlah_lab')
                            ->label('Jumlah Laboratorium')
                            ->placeholder('Contoh: 3')
                            ->numeric()
                            ->helperText('Isi angka saja.'),

                        TextInput::make('jumlah_mitra_industri')
                            ->label('Jumlah Mitra Industri')
                            ->placeholder('Contoh: 12')
                            ->numeric()
                            ->helperText('Isi angka saja.'),
                    ])
                    ->columns(3),

                // ===============================
                // PROSPEK KARIER
                // ===============================
                Section::make('Prospek Karier')
                    ->icon('heroicon-o-briefcase')
                    ->schema([
                        TagsInput::make('prospek_karier')
                            ->label('Prospek Karier')
                            ->placeholder('Contoh: Backend Engineer, Data Analyst, UI/UX Designer (tekan Enter)')
                            ->helperText('Setiap item akan tampil sebagai chip. Tekan Enter untuk menambah.'),
                    ]),

                // ===============================
                // SEJARAH, VISI & MISI
                // ===============================
                Section::make('Sejarah, Visi & Misi')
                    ->icon('heroicon-o-book-open')
                    ->schema([
                        Textarea::make('sejarah')
                            ->label('Sejarah')
                            ->placeholder('Tuliskan sejarah singkat berdirinya program studi...')
                            ->rows(4),

                        Textarea::make('visi')
                            ->label('Visi')
                            ->placeholder('Contoh: Menjadi program studi unggul di bidang teknologi informasi...')
                            ->rows(2),

                        TagsInput::make('misi')
                            ->label('Misi Program Studi')
                            ->placeholder('Contoh: Menyelenggarakan pendidikan berkualitas (tekan Enter)')
                            ->helperText('Tulis per poin misi, lalu tekan Enter.'),
                    ]),

                // ===============================
                // DOKUMEN SK
                // ===============================
                Section::make('Dokumen SK')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Repeater::make('daftar_sk')
                            ->label('Daftar Dokumen SK')
                            ->schema([
                                TextInput::make('nama_sk')
                                    ->label('Nama SK')
                                    ->placeholder('Contoh: SK Pendirian Program Studi')
                                    ->required(),

                                TextInput::make('nomor_sk')
                                    ->label('Nomor SK')
                                    ->placeholder('Contoh: 123/ABC/2020'),

                                TextInput::make('link_sk')
                                    ->label('Link SK')
                                    ->placeholder('Contoh: https://drive.google.com/file/d/xxxx/view')
                                    ->url()
                                    ->helperText('Link PDF / Drive / dokumen resmi.'),
                            ])
                            ->columns(3)
                            ->collapsible()
                            ->addActionLabel('Tambah Dokumen SK'),
                        TextInput::make('link_akreditasi')
                            ->label('Link Sertifikat Akreditasi')
                            ->placeholder('Contoh: https://drive.google.com/file/d/xxxx/view')
                            ->helperText('Boleh link Google Drive / PDF resmi.')
                            ->url()
                            ->nullable(),
                    ]),

                // ===============================
                // STATUS
                // ===============================
                Section::make('Status')
                    ->icon('heroicon-o-check-circle')
                    ->schema([
                        Toggle::make('aktif')
                            ->label('Aktif')
                            ->default(true)
                            ->helperText('Jika nonaktif, program studi tidak tampil di website.'),
                    ]),
            ]);
    }
}
