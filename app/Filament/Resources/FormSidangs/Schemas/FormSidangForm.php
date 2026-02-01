<?php

namespace App\Filament\Resources\FormSidangs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FormSidangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Jenis & Status')
                    ->icon('heroicon-o-adjustments-horizontal')
                    ->schema([
                        Grid::make(2)->schema([

                            Select::make('jenis_sidang')
                                ->label('Jenis Sidang')
                                ->options([
                                    'proposal' => 'proposal',
                                    'akhir' => 'akhir',
                                ])
                                ->required()
                                ->native(false)
                                ->rules(['in:proposal,akhir'])
                                ->validationMessages([
                                    'required' => 'Jenis bimbingan wajib dipilih.',
                                    'in' => 'Jenis bimbingan tidak valid.',
                                ]),

                            Toggle::make('aktif')
                                ->label('Status Aktif')
                                ->default(true),
                        ]),
                    ]),

                Section::make('Konten Kartu')
                    ->icon('heroicon-o-rectangle-stack')
                    ->schema([

                        Grid::make(2)->schema([
                            TextInput::make('judul_kartu')
                                ->label('Judul Kartu')
                                ->placeholder('Contoh: Form Bimbingan')
                                ->required()
                                ->maxLength(60)
                                ->validationMessages([
                                    'required' => 'Judul kartu wajib diisi.',
                                    'max' => 'Judul kartu maksimal 60 karakter.',
                                ]),

                            TextInput::make('subjudul')
                                ->label('Subjudul')
                                ->placeholder('Contoh: Form Bimbingan KKP')
                                ->required()
                                ->maxLength(80)
                                ->validationMessages([
                                    'required' => 'Subjudul wajib diisi.',
                                    'max' => 'Subjudul maksimal 80 karakter.',
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

                Section::make('Link Form')
                    ->icon('heroicon-o-link')
                    ->schema([
                        TextInput::make('url_form')
                            ->label('URL Form')
                            ->placeholder('https://... atau #')
                            ->required()
                            // boleh URL http/https atau '#'
                            ->rules([
                                'regex:/^(#|https?:\/\/[^\s]+)$/'
                            ])
                            ->helperText('Gunakan URL lengkap (https://...) atau isi # jika belum tersedia.')
                            ->validationMessages([
                                'required' => 'URL form wajib diisi.',
                                'regex' => 'URL harus diawali http:// atau https://, atau gunakan # jika belum tersedia.',
                            ]),
                    ]),
            ]);
    }
}
