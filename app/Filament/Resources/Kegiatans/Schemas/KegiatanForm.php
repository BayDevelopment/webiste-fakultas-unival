<?php

namespace App\Filament\Resources\Kegiatans\Schemas;

use Carbon\Carbon;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;


class KegiatanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kegiatan')
                    ->icon('heroicon-o-calendar-days')
                    ->description('Kelola data kegiatan fakultas')
                    ->schema([
                        // COVER IMAGE
                        FileUpload::make('cover_image')
                            ->label('Cover Kegiatan')
                            ->image()
                            ->disk('public')                  // ✅ penting
                            ->directory('activities')         // ✅ folder final
                            ->visibility('public')            // ✅ supaya URL bisa diakses
                            ->imagePreviewHeight('200')
                            ->acceptedFileTypes(['image/jpeg', 'image/jpg']) // ✅ jaga-jaga
                            ->maxSize(1024)
                            ->helperText('Format JPG/JPEG, maksimal 1MB')
                            ->preserveFilenames(),            // opsional, tapi membantu

                        // TYPE (KATEGORI)
                        Select::make('type')
                            ->label('Jenis Kegiatan')
                            ->options([
                                'Seminar'   => 'Seminar',
                                'Kompetisi' => 'Kompetisi',
                                'Workshop'  => 'Workshop',
                            ])
                            ->required()
                            ->native(false)
                            ->prefixIcon('heroicon-o-tag')
                            ->helperText('Dipakai sebagai kategori/filter kegiatan.'),

                        // DATE
                        // DATE
                        DatePicker::make('activity_date')
                            ->label('Tanggal Kegiatan')
                            ->required()
                            ->closeOnDateSelection()
                            ->prefixIcon('heroicon-o-calendar')
                            ->helperText('Menentukan status otomatis: mendatang / selesai.')
                            ->live() // penting!
                            ->afterStateUpdated(function (Set $set, $state) {
                                if (! $state) return;

                                $set(
                                    'status_kegiatan',
                                    Carbon::parse($state)->isFuture() || Carbon::parse($state)->isToday()
                                        ? 'mendatang'
                                        : 'selesai'
                                );
                            }),

                        // STATUS KEGIATAN (AUTO)
                        Select::make('status_kegiatan')
                            ->label('Status Kegiatan')
                            ->options([
                                'mendatang' => 'Mendatang',
                                'selesai'   => 'Selesai',
                            ])
                            ->disabled()      // tidak bisa diedit manual
                            ->dehydrated()    // tetap disimpan ke DB
                            ->helperText('Status ditentukan otomatis dari tanggal kegiatan.')
                            ->default('mendatang'),


                        // TITLE
                        TextInput::make('title')
                            ->label('Judul Kegiatan')
                            ->required()
                            ->maxLength(150)
                            ->placeholder('Contoh: Roadmap Karier Data & AI')
                            ->prefixIcon('heroicon-o-pencil-square'),

                        // EXCERPT (Textarea TIDAK support prefixIcon di v5)
                        Textarea::make('excerpt')
                            ->label('Deskripsi Singkat')
                            ->rows(3)
                            ->maxLength(255)
                            ->placeholder('Ringkasan singkat kegiatan (muncul di kartu)')
                            ->helperText('📝 Ditampilkan pada kartu kegiatan.')
                            ->nullable(),

                        // WARNA KALENDER (HANYA kalau kolomnya ada di DB)
                        // Kalau kamu belum jadi menambah kolom warna_kalender, hapus block ini.
                        ColorPicker::make('warna_kalender')
                            ->label('Warna Kalender (Opsional)')
                            ->helperText('Jika kosong, warna otomatis: mendatang biru, selesai abu.')
                            ->nullable(),

                        // STATUS AKTIF
                        Toggle::make('status_aktif')
                            ->label('Status Aktif')
                            ->default(true)
                            ->onIcon('heroicon-o-check-circle')
                            ->offIcon('heroicon-o-x-circle')
                            ->helperText('Nonaktifkan untuk menyembunyikan kegiatan.'),
                    ])
                    ->columns(2),
            ]);
    }
}
