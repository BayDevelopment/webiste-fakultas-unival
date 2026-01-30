<?php

namespace App\Filament\Resources\ContactSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Header Halaman')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('page_title')
                                ->label('Judul Halaman')
                                ->placeholder('Kontak')
                                ->required()
                                ->maxLength(100),

                            TextInput::make('page_subtitle')
                                ->label('Subjudul Halaman')
                                ->placeholder('Butuh bantuan? Hubungi kami kapan saja.')
                                ->maxLength(255),
                        ]),
                    ]),

                Section::make('Card Kontak')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('card_title')
                                ->label('Judul Card')
                                ->placeholder('Mari terhubung')
                                ->required()
                                ->maxLength(120),

                            Textarea::make('card_description')
                                ->label('Deskripsi Card')
                                ->placeholder('Kami siap membantu pertanyaan, kerja sama, maupun konsultasi Anda.')
                                ->rows(4)
                                ->maxLength(1000)
                                ->columnSpan(2),
                        ]),
                    ]),

                Section::make('Badge')
                    ->icon('heroicon-o-sparkles')
                    ->description('Label singkat yang ditampilkan di bagian atas')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('badge_1')
                                ->label('Badge 1')
                                ->placeholder('Support')
                                ->maxLength(40),

                            TextInput::make('badge_2')
                                ->label('Badge 2')
                                ->placeholder('Respon Cepat')
                                ->maxLength(40),

                            TextInput::make('badge_3')
                                ->label('Badge 3')
                                ->placeholder('Aman & Nyaman')
                                ->maxLength(40),
                        ]),
                    ]),

                Section::make('Informasi Kontak')
                    ->icon('heroicon-o-phone')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('office_hours_label')
                                ->label('Label Hari')
                                ->placeholder('Senin – Jumat')
                                ->required()
                                ->maxLength(60),

                            TextInput::make('office_hours_time')
                                ->label('Jam Operasional')
                                ->placeholder('08:00 – 16:00 WIB')
                                ->required()
                                ->maxLength(60),

                            TextInput::make('address_text')
                                ->label('Alamat')
                                ->placeholder('Jl. Contoh No. 123, Jakarta')
                                ->maxLength(255)
                                ->columnSpan(2),

                            TextInput::make('contact_email')
                                ->label('Email')
                                ->placeholder('info@domain.ac.id')
                                ->email()
                                ->maxLength(120),
                            // ✅ TELP (tambahan)
                            TextInput::make('contact_phone')
                                ->label('No. Telepon')
                                ->placeholder('0821xxxxxxx atau 62821xxxxxxx')
                                ->tel()
                                ->maxLength(15)
                                ->regex('/^(08|62)\d{8,13}$/')
                                ->validationMessages([
                                    'regex' => 'Nomor harus diawali 08 atau 62 (contoh: 0821xxxxxxx atau 62821xxxxxxx).',
                                ]),
                        ]),
                    ]),

                Section::make('Tombol Aksi')
                    ->icon('heroicon-o-cursor-arrow-rays')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('primary_button_text')
                                ->label('Teks Tombol Utama')
                                ->placeholder('Kirim Pesan')
                                ->required()
                                ->maxLength(40),

                            TextInput::make('primary_button_url')
                                ->label('URL Tombol Utama')
                                ->placeholder('#kontak atau /kontak atau https://example.com')
                                ->maxLength(255),


                            TextInput::make('secondary_button_text')
                                ->label('Teks Tombol Kedua')
                                ->placeholder('Email Kami')
                                ->required()
                                ->maxLength(40),

                            TextInput::make('secondary_button_url')
                                ->label('URL Tombol Kedua')
                                ->placeholder('#kontak atau /kontak atau https://example.com')
                                ->maxLength(255),
                        ]),
                    ]),

                Section::make('Hero & CTA')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        Grid::make(2)->schema([
                            FileUpload::make('hero_image')
                                ->label('Gambar Hero')
                                ->helperText('Upload gambar JPG (maks 1MB)')
                                ->image()
                                ->directory('contact')
                                ->acceptedFileTypes(['image/jpeg'])
                                ->maxSize(1024)
                                ->nullable(),

                            Toggle::make('is_active')
                                ->label('Tampilkan Halaman Kontak')
                                ->default(true),

                            TextInput::make('cta_title')
                                ->label('Judul CTA')
                                ->placeholder('Kirim pesan sekarang')
                                ->required()
                                ->maxLength(80),

                            TextInput::make('cta_subtitle')
                                ->label('Subjudul CTA')
                                ->placeholder('Kami akan merespons secepat mungkin')
                                ->maxLength(120),
                        ]),
                    ]),

                // ✅ EMBED MAP (tambahan) - taro di bawah grid biar full lebar
                Textarea::make('location_embed')
                    ->label('Lokasi (Embed Maps)')
                    ->placeholder('<iframe src="https://www.google.com/maps/embed?pb=..." width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>')
                    ->rows(6)
                    ->maxLength(5000)
                    ->helperText('Tempelkan kode iframe Google Maps. Akan ditampilkan di halaman kontak.')
                    ->columnSpanFull(),
            ]);
    }
}
