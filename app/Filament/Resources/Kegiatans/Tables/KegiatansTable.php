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
use Illuminate\Support\Facades\Storage;

class KegiatansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('cover_image')
                    ->label('Cover')
                    ->circular()
                    ->size(56)
                    ->defaultImageUrl(asset('images/avatar-placeholder.jpg')),


                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(40)
                    ->icon('heroicon-o-megaphone'),


                BadgeColumn::make('type')
                    ->label('Jenis')
                    ->color(fn(string $state): string => match ($state) {
                        'Seminar'   => 'primary',
                        'Workshop'  => 'success',
                        'Kompetisi' => 'warning',
                        default     => 'gray',
                    })
                    ->sortable(),


                TextColumn::make('activity_date')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),


                BadgeColumn::make('status_kegiatan')
                    ->label('Status')
                    ->formatStateUsing(fn(string $state) => ucfirst($state)) // mendatang → Mendatang
                    ->color(fn(string $state): string => match ($state) {
                        'mendatang' => 'success',
                        'selesai'   => 'gray',
                        default     => 'gray',
                    })
                    ->sortable(),


                ToggleColumn::make('status_aktif')
                    ->label('Aktif')
                    ->onColor('success')
                    ->offColor('danger'),
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
                        ->before(function ($record) {
                            // hapus file cover jika ada
                            if ($record->cover_image && Storage::disk('public')->exists($record->cover_image)) {
                                Storage::disk('public')->delete($record->cover_image);
                            }
                        })
                        ->successNotification(
                            Notification::make()
                                ->title('Terhapus')
                                ->body('Data dan gambar berhasil dihapus.')
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
