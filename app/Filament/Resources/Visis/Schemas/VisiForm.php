<?php

namespace App\Filament\Resources\Visis\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class VisiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('icon')
                    ->label('Icon')
                    ->placeholder('contoh: fa-solid fa-bullseye')
                    ->required()
                    ->maxLength(100)
                    ->live(debounce: 200)
                    ->helperText(function ($state) {
                        $limit = 100;
                        $warnAt = 15;

                        $len  = mb_strlen((string) ($state ?? ''));
                        $left = $limit - $len;

                        $class = $left < 0
                            ? 'text-red-600'
                            : ($left <= $warnAt ? 'text-yellow-600' : 'text-gray-500');

                        $text = $left < 0
                            ? "Melebihi {$limit} karakter (lebih " . abs($left) . ")"
                            : "Maksimal {$limit} karakter • Sisa {$left}";

                        return new HtmlString("<span class=\"{$class}\">{$text}</span>");
                    }),

                TextInput::make('judul')
                    ->label('Judul')
                    ->placeholder('Visi')
                    ->required()
                    ->maxLength(50)
                    ->live(debounce: 200)
                    ->helperText(function ($state) {
                        $limit = 50;
                        $warnAt = 10;

                        $len  = mb_strlen((string) ($state ?? ''));
                        $left = $limit - $len;

                        $class = $left < 0
                            ? 'text-red-600'
                            : ($left <= $warnAt ? 'text-yellow-600' : 'text-gray-500');

                        $text = $left < 0
                            ? "Melebihi {$limit} karakter (lebih " . abs($left) . ")"
                            : "Maksimal {$limit} karakter • Sisa {$left}";

                        return new HtmlString("<span class=\"{$class}\">{$text}</span>");
                    }),

                TextInput::make('subjudul')
                    ->label('Subjudul')
                    ->placeholder('Misi')
                    ->required()
                    ->maxLength(50)
                    ->live(debounce: 200)
                    ->helperText(function ($state) {
                        $limit = 50;
                        $warnAt = 10;

                        $len  = mb_strlen((string) ($state ?? ''));
                        $left = $limit - $len;

                        $class = $left < 0
                            ? 'text-red-600'
                            : ($left <= $warnAt ? 'text-yellow-600' : 'text-gray-500');

                        $text = $left < 0
                            ? "Melebihi {$limit} karakter (lebih " . abs($left) . ")"
                            : "Maksimal {$limit} karakter • Sisa {$left}";

                        return new HtmlString("<span class=\"{$class}\">{$text}</span>");
                    }),

                TextInput::make('title')
                    ->label('Title')
                    ->placeholder('Title untuk visi')
                    ->required()
                    ->maxLength(150)
                    ->live(debounce: 200)
                    ->helperText(function ($state) {
                        $limit = 150;
                        $warnAt = 15;

                        $len  = mb_strlen((string) ($state ?? ''));
                        $left = $limit - $len;

                        $class = $left < 0
                            ? 'text-red-600'
                            : ($left <= $warnAt ? 'text-yellow-600' : 'text-gray-500');

                        $text = $left < 0
                            ? "Melebihi {$limit} karakter (lebih " . abs($left) . ")"
                            : "Maksimal {$limit} karakter • Sisa {$left}";

                        return new HtmlString("<span class=\"{$class}\">{$text}</span>");
                    }),

                TextInput::make('subtitle')
                    ->label('Subtitle')
                    ->placeholder('Title Untuk Misi')
                    ->required()
                    ->maxLength(150)
                    ->live(debounce: 200)
                    ->helperText(function ($state) {
                        $limit = 150;
                        $warnAt = 15;

                        $len  = mb_strlen((string) ($state ?? ''));
                        $left = $limit - $len;

                        $class = $left < 0
                            ? 'text-red-600'
                            : ($left <= $warnAt ? 'text-yellow-600' : 'text-gray-500');

                        $text = $left < 0
                            ? "Melebihi {$limit} karakter (lebih " . abs($left) . ")"
                            : "Maksimal {$limit} karakter • Sisa {$left}";

                        return new HtmlString("<span class=\"{$class}\">{$text}</span>");
                    }),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->placeholder('Menjadi fakultas unggul dalam ..')
                    ->required()
                    ->rows(4)
                    ->maxLength(500)
                    ->live(debounce: 200)
                    ->columnSpanFull()
                    ->helperText(function ($state) {
                        $limit = 500;
                        $warnAt = 25;

                        $len  = mb_strlen((string) ($state ?? ''));
                        $left = $limit - $len;

                        $class = $left < 0
                            ? 'text-red-600'
                            : ($left <= $warnAt ? 'text-yellow-600' : 'text-gray-500');

                        $text = $left < 0
                            ? "Melebihi {$limit} karakter (lebih " . abs($left) . ")"
                            : "Maksimal {$limit} karakter • Sisa {$left}";

                        return new HtmlString("<span class=\"{$class}\">{$text}</span>");
                    }),

                Toggle::make('status_aktif')
                    ->label('Status Aktif')
                    ->default(true),
            ])
            ->columns(2);
    }
}
