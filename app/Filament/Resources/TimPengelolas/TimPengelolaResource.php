<?php

namespace App\Filament\Resources\TimPengelolas;

use App\Filament\Resources\TimPengelolas\Pages\CreateTimPengelola;
use App\Filament\Resources\TimPengelolas\Pages\EditTimPengelola;
use App\Filament\Resources\TimPengelolas\Pages\ListTimPengelolas;
use App\Filament\Resources\TimPengelolas\Schemas\TimPengelolaForm;
use App\Filament\Resources\TimPengelolas\Tables\TimPengelolasTable;
use App\Models\TimPengelola;
use App\Models\TimPengelolaModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TimPengelolaResource extends Resource
{
    protected static ?string $model = TimPengelolaModel::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $recordTitleAttribute = 'name';

    // ADD
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Master Data';
    }
    public static function getModelLabel(): string
    {
        return 'Tim Pengelola';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Data Tim Pengelola';
    }
    protected static ?string $navigationLabel = 'Tim Pengelola';
    protected static ?int    $navigationSort  = 11;
    // LAST ADD

    public static function form(Schema $schema): Schema
    {
        return TimPengelolaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TimPengelolasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTimPengelolas::route('/'),
            'create' => CreateTimPengelola::route('/create'),
            'edit' => EditTimPengelola::route('/{record}/edit'),
        ];
    }
}
