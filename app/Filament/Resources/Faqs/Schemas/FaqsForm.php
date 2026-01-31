<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class FaqsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('FAQ')
                    ->description('Pertanyaan dari user dan jawaban dari admin.')
                    ->icon(Heroicon::QuestionMarkCircle)
                    ->columns(2)
                    ->schema([
                        TextInput::make('question')
                            ->label('Pertanyaan')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->prefixIcon(Heroicon::QuestionMarkCircle),

                        Textarea::make('answer')
                            ->label('Jawaban Admin')
                            ->rows(6)
                            ->nullable()
                            ->columnSpanFull()
                            ->helperText('Jika diisi, waktu dijawab akan terisi otomatis.')
                            ->hintIcon(Heroicon::ChatBubbleLeftRight)
                            ->hintIconTooltip('Jawaban dari admin'),

                        DateTimePicker::make('answered_at')
                            ->label('Dijawab pada')
                            ->seconds(false)
                            ->disabled()              // biar admin gak edit manual
                            ->dehydrated(false)       // gak ikut disimpan dari form (di-handle model)
                            ->prefixIcon(Heroicon::Clock),

                        Toggle::make('is_active')
                            ->label('Tampilkan (Aktif)')
                            ->default(true)
                            ->inline(false)
                            ->helperText('Jika nonaktif, FAQ tidak muncul di halaman kontak.')
                            ->columnSpan(1),
                    ]),
            ]);
    }
}
