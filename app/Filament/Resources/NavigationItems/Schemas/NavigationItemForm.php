<?php

namespace App\Filament\Resources\NavigationItems\Schemas;

use Closure;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class NavigationItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(1)->schema([

                /* =====================
                 * GRUP / BAGIAN
                 * ===================== */
                Section::make('Grup / Bagian')
                    ->icon('heroicon-o-rectangle-group')
                    ->columns(3)
                    ->schema([
                        TextInput::make('group_key')
                            ->label('Kunci Grup')
                            ->placeholder('portal')
                            ->helperText('Gunakan huruf kecil tanpa spasi. Contoh: portal, kuisioner, e-surat')
                            ->required(),

                        TextInput::make('group_label')
                            ->label('Nama Grup')
                            ->placeholder('PORTAL')
                            ->helperText('Nama grup yang tampil di menu')
                            ->required(),

                        TextInput::make('group_order')
                            ->label('Urutan Grup')
                            ->placeholder('1')
                            ->numeric()
                            ->default(0)
                            ->required(),
                    ]),

                /* =====================
                 * ITEM MENU
                 * ===================== */
                Section::make('Item Menu')
                    ->icon('heroicon-o-list-bullet')
                    ->columns(2)
                    ->schema([
                        TextInput::make('label')
                            ->label('Nama Menu')
                            ->placeholder('SIAKAD')
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('url')
                            ->label('URL / Tautan')
                            ->placeholder('/form-bimbingan atau https://kampus.ac.id')
                            ->helperText('Isi path internal atau URL lengkap.')
                            ->required()
                            ->rules([
                                fn() => function ($attr, $value, $fail) {
                                    $isAbsoluteUrl = filter_var($value, FILTER_VALIDATE_URL);
                                    $isInternalPath = str_starts_with($value, '/');

                                    if (! $isAbsoluteUrl && ! $isInternalPath) {
                                        $fail('URL harus diawali dengan "/" atau "http(s)://".');
                                    }
                                },
                            ]),

                        TextInput::make('icon')
                            ->label('Ikon')
                            ->placeholder('heroicon-o-home')
                            ->columnSpanFull(),

                        TextInput::make('item_order')
                            ->label('Urutan Menu')
                            ->numeric()
                            ->default(0)
                            ->required(),

                        Toggle::make('is_external')
                            ->label('Link Eksternal?')
                            ->helperText('Aktifkan jika URL mengarah ke website luar'),

                        Toggle::make('is_active')
                            ->label('Aktif?')
                            ->default(true),
                    ])
            ]),
        ]);
    }
}
