<?php

namespace App\Filament\Resources\SertifikatAkreditasis\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SertifikatAkreditasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Program Studi')
                    ->icon('heroicon-o-building-library')
                    ->schema([
                        Grid::make(2)->schema([

                            TextInput::make('prodi')
                                ->label('Program Studi')
                                ->placeholder('Contoh: Teknik Informatika')
                                ->required()
                                ->maxLength(100)
                                ->validationMessages([
                                    'required' => 'Program studi wajib diisi.',
                                    'max' => 'Program studi maksimal 100 karakter.',
                                ]),

                            Toggle::make('aktif')
                                ->label('Status Aktif')
                                ->default(true),
                        ]),
                    ]),

                /*
        |--------------------------------------------------------------------------
        | Konten Kartu Sertifikat
        |--------------------------------------------------------------------------
        */
                Section::make('Konten Kartu')
                    ->icon('heroicon-o-rectangle-stack')
                    ->schema([

                        TextInput::make('judul_kartu')
                            ->label('Judul Kartu')
                            ->default('Sertifikat Akreditasi')
                            ->required()
                            ->maxLength(100)
                            ->validationMessages([
                                'required' => 'Judul kartu wajib diisi.',
                                'max' => 'Judul kartu maksimal 100 karakter.',
                            ]),

                        Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->default('Klik tombol di bawah untuk membuka sertifikat.')
                            ->rows(3)
                            ->required()
                            ->maxLength(255)
                            ->validationMessages([
                                'required' => 'Deskripsi wajib diisi.',
                                'max' => 'Deskripsi maksimal 255 karakter.',
                            ]),

                        Grid::make(2)->schema([

                            TextInput::make('teks_tombol')
                                ->label('Teks Tombol')
                                ->default('Klik Disini')
                                ->required()
                                ->maxLength(30)
                                ->validationMessages([
                                    'required' => 'Teks tombol wajib diisi.',
                                    'max' => 'Teks tombol maksimal 30 karakter.',
                                ]),

                            TextInput::make('catatan')
                                ->label('Catatan')
                                ->placeholder('*Jika link belum tersedia, silakan hubungi admin/prodi.')
                                ->maxLength(255)
                                ->validationMessages([
                                    'max' => 'Catatan maksimal 255 karakter.',
                                ]),
                        ]),
                    ]),

                /*
        |--------------------------------------------------------------------------
        | Link Sertifikat
        |--------------------------------------------------------------------------
        */
                Section::make('Link Sertifikat')
                    ->icon('heroicon-o-link')
                    ->schema([
                        TextInput::make('url_sertifikat')
                            ->label('URL Sertifikat')
                            ->placeholder('https://... atau #')
                            ->required()
                            ->rules([
                                'regex:/^(#|https?:\/\/[^\s]+)$/'
                            ])
                            ->helperText('Gunakan URL lengkap (https://...) atau isi # jika sertifikat belum tersedia.')
                            ->validationMessages([
                                'required' => 'URL sertifikat wajib diisi.',
                                'regex' => 'URL harus diawali http:// atau https://, atau gunakan #.',
                            ]),
                    ]),
            ]);
    }
}
