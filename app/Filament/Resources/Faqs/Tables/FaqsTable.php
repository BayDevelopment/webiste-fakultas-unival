<?php

namespace App\Filament\Resources\Faqs\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class FaqsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('question')
                    ->label('Pertanyaan')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->limit(80)
                    ->icon(Heroicon::QuestionMarkCircle),

                TextColumn::make('answer')
                    ->label('Jawaban')
                    ->toggleable(isToggledHiddenByDefault: true) // default disembunyikan (biar table ringkas)
                    ->wrap()
                    ->limit(80)
                    ->searchable()
                    ->icon(Heroicon::ChatBubbleLeftRight),

                BadgeColumn::make('answer_status')
                    ->label('Status')
                    ->getStateUsing(fn($record) => filled($record->answer) ? 'Answered' : 'Draft')
                    ->colors([
                        'success' => 'Answered',
                        'gray' => 'Draft',
                    ])
                    ->icons([
                        'success' => Heroicon::CheckCircle,
                        'gray' => Heroicon::PencilSquare,
                    ])
                    ->sortable(query: function (Builder $query, string $direction): Builder {
                        // Sort answered dulu / draft dulu berdasarkan ada/tidaknya answer
                        return $query->orderByRaw(
                            "CASE WHEN answer IS NULL OR answer = '' THEN 0 ELSE 1 END {$direction}"
                        );
                    }),

                ToggleColumn::make('is_active')
                    ->label('Aktif')
                    ->onIcon(Heroicon::Eye)
                    ->offIcon(Heroicon::EyeSlash)
                    ->sortable(),

                TextColumn::make('answered_at')
                    ->label('Dijawab')
                    ->dateTime('d M Y H:i')
                    ->placeholder('-')
                    ->sortable()
                    ->icon(Heroicon::Clock),

                TextColumn::make('updated_at')
                    ->label('Update')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->icon(Heroicon::ArrowPath),
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
