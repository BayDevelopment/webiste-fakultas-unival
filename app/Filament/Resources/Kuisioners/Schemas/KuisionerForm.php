<?php

namespace App\Filament\Resources\Kuisioners\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class KuisionerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kuisioner')
                    ->icon('heroicon-o-clipboard-document-check')
                    ->schema([
                        Grid::make(2)->schema([

                            Select::make('jenis_user')
                                ->label('Jenis User')
                                ->options([
                                    'dosen' => 'Dosen',
                                    'mahasiswa' => 'Mahasiswa',
                                ])
                                ->required()
                                ->native(false)
                                ->validationMessages([
                                    'required' => 'Jenis user wajib dipilih.',
                                ]),

                            TextInput::make('periode')
                                ->label('Periode Kuisioner')
                                ->placeholder('Contoh: Ganjil tahun ajaran 2024/2025')
                                ->required()
                                ->maxLength(100)
                                ->validationMessages([
                                    'required' => 'Periode kuisioner wajib diisi.',
                                    'max' => 'Periode maksimal 100 karakter.',
                                ]),
                        ]),
                    ]),

                /*
            |--------------------------------------------------------------------------
            | Konten Kartu
            |--------------------------------------------------------------------------
            */
                Section::make('Konten Kartu')
                    ->icon('heroicon-o-rectangle-stack')
                    ->schema([
                        Grid::make(2)->schema([

                            TextInput::make('judul_kartu')
                                ->label('Judul Kartu')
                                ->default('Kuisioner')
                                ->required()
                                ->maxLength(50)
                                ->validationMessages([
                                    'required' => 'Judul kartu wajib diisi.',
                                    'max' => 'Judul kartu maksimal 50 karakter.',
                                ]),

                            TextInput::make('teks_tombol')
                                ->label('Teks Tombol')
                                ->default('Klik Disini')
                                ->required()
                                ->maxLength(30)
                                ->validationMessages([
                                    'required' => 'Teks tombol wajib diisi.',
                                    'max' => 'Teks tombol maksimal 30 karakter.',
                                ]),
                        ]),

                        Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->rows(3)
                            ->required()
                            ->maxLength(255)
                            ->validationMessages([
                                'required' => 'Deskripsi wajib diisi.',
                                'max' => 'Deskripsi maksimal 255 karakter.',
                            ]),

                        Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->rows(2)
                            ->maxLength(255)
                            ->helperText('Contoh: *Jika link belum tersedia, silakan hubungi admin.')
                            ->validationMessages([
                                'max' => 'Catatan maksimal 255 karakter.',
                            ]),
                    ]),

                /*
            |--------------------------------------------------------------------------
            | Link & Status
            |--------------------------------------------------------------------------
            */
                Section::make('Link & Status')
                    ->icon('heroicon-o-link')
                    ->schema([
                        Grid::make(2)->schema([

                            TextInput::make('url_kuisioner')
                                ->label('URL Kuisioner')
                                ->placeholder('https://... atau #')
                                ->required()
                                ->rules([
                                    'regex:/^(#|https?:\/\/[^\s]+)$/'
                                ])
                                ->validationMessages([
                                    'required' => 'URL kuisioner wajib diisi.',
                                    'regex' => 'URL harus diawali https:// atau menggunakan #',
                                ]),

                            Toggle::make('aktif')
                                ->label('Status Aktif')
                                ->default(true),
                        ]),
                    ]),
            ]);
    }
}
