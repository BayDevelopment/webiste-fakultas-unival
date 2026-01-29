<?php

namespace App\Filament\Resources\Kegiatans\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class KegiatansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // IMAGE
                ImageColumn::make('cover_image')
                    ->label('Cover')
                    ->square()
                    ->circular()
                    ->size(60),

                // TITLE
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                // TYPE
                BadgeColumn::make('type')
                    ->label('Jenis')
                    ->colors([
                        'primary' => 'Seminar',
                        'success' => 'Workshop',
                        'warning' => 'Kompetisi',
                    ]),

                // DATE
                TextColumn::make('activity_date')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                // STATUS
                ToggleColumn::make('status_aktif')
                    ->label('Aktif')
                    ->onColor('success')
                    ->offColor('danger')
                    ->beforeStateUpdated(function ($record, bool $state): bool {
                        // return false kalau mau blok update dalam kondisi tertentu
                        return true;
                    }),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options([
                        'Seminar' => 'Seminar',
                        'Kompetisi' => 'Kompetisi',
                        'Workshop' => 'Workshop',
                    ]),
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
