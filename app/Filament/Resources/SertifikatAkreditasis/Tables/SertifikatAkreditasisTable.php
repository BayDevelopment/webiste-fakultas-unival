<?php

namespace App\Filament\Resources\SertifikatAkreditasis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class SertifikatAkreditasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('prodi')
                    ->label('Program Studi')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('judul_kartu')
                    ->label('Judul Kartu')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(45)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('teks_tombol')
                    ->label('Teks Tombol')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('catatan')
                    ->label('Catatan')
                    ->limit(45)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('url_sertifikat')
                    ->label('URL Sertifikat')
                    ->limit(30)
                    ->copyable()
                    ->copyMessage('URL disalin')
                    ->copyMessageDuration(1500),

                BadgeColumn::make('aktif')
                    ->label('Status')
                    ->colors([
                        'success' => true,
                        'secondary' => false,
                    ])
                    ->formatStateUsing(fn($state) => $state ? 'Aktif' : 'Nonaktif'),

                ToggleColumn::make('aktif')
                    ->label('Aktif'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
