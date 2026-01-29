<?php

namespace App\Filament\Resources\JurusanHomeProdis\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class JurusanHomeProdisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('jenjang')
                    ->label('Jenjang')
                    ->badge()
                    ->sortable(),

                TextColumn::make('nama')
                    ->label('Nama Prodi')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('deskripsi_singkat')
                    ->label('Deskripsi')
                    ->limit(60)
                    ->wrap()
                    ->toggleable(),

                // tags (json) ditampilkan sebagai badge per tag
                TextColumn::make('tags')
                    ->label('Tags')
                    ->getStateUsing(function ($record) {
                        $tags = $record->tags;

                        // kalau masih string JSON, decode dulu
                        if (is_string($tags)) {
                            $tags = json_decode($tags, true);
                        }

                        // pastikan array
                        $tags = is_array($tags) ? $tags : [];

                        // ambil values aja + buang kosong/null
                        return collect($tags)
                            ->values()
                            ->filter(fn($tag) => filled($tag))
                            ->all();
                    })
                    ->badge()
                    ->separator()
                    ->placeholder('-'),
                ToggleColumn::make('status_aktif')
                    ->label('Aktif')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make()
                        ->label('Edit')
                        ->icon('heroicon-o-pencil-square')
                        ->color('primary'),

                    DeleteAction::make()
                        ->label('Hapus')
                        ->icon('heroicon-o-trash')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->modalHeading('Hapus data?')
                        ->modalDescription('Data yang dihapus tidak bisa dikembalikan.')
                        ->successNotification(
                            Notification::make()
                                ->title('Terhapus')
                                ->body('Data berhasil dihapus.')
                                ->success()
                        ),
                ])
                    ->label('Aksi')
                    ->icon('heroicon-o-ellipsis-vertical')
                    ->button()
                    ->outlined()
                    ->tooltip('Aksi data')
                    ->dropdownPlacement('bottom-end')
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
