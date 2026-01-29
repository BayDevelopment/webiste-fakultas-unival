<?php

namespace App\Filament\Resources\Misis\Schemas;

use App\Models\VisiModel;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class MisiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('visi_id')
                    ->label('Visi')
                    ->relationship('visi', 'judul')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->disabled(fn() => VisiModel::count() === 0)
                    ->helperText(
                        fn() =>
                        VisiModel::count() === 0
                            ? new HtmlString('<span class="text-red-600">Data visi kosong, segera isi terlebih dahulu</span>')
                            : null
                    ),

                Textarea::make('title')
                    ->label('Misi')
                    ->placeholder('Contoh: Meningkatkan kualitas layanan pendidikan')
                    ->required()
                    ->rows(3)
                    ->maxLength(150) // sesuaikan dengan migration (100 / 150)
                    ->live(debounce: 200)
                    ->helperText(function ($state) {
                        $limit = 150;   // HARUS sama dengan maxLength
                        $warnAt = 15;

                        $len  = mb_strlen((string) ($state ?? ''));
                        $left = $limit - $len;

                        // 🔴 merah kalau mentok / lewat
                        // 🟡 kuning kalau mendekati
                        // ⚪ abu-abu normal
                        $class = $left <= 0
                            ? 'text-red-600'
                            : ($left <= $warnAt ? 'text-yellow-600' : 'text-gray-500');

                        $text = $left <= 0
                            ? "Maksimal {$limit} karakter tercapai"
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
