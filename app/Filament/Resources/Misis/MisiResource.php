<?php

namespace App\Filament\Resources\Misis;

use App\Filament\Resources\Misis\Pages\CreateMisi;
use App\Filament\Resources\Misis\Pages\EditMisi;
use App\Filament\Resources\Misis\Pages\ListMisis;
use App\Filament\Resources\Misis\Schemas\MisiForm;
use App\Filament\Resources\Misis\Tables\MisisTable;
use App\Models\Misi;
use App\Models\MisiModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MisiResource extends Resource
{
    protected static ?string $model = MisiModel::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-flag';

    protected static ?string $recordTitleAttribute = 'judul';

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
        return 'Misi';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Data Misi';
    }
    protected static ?string $navigationLabel = 'Misi';
    protected static ?int    $navigationSort  = 7;
    // LAST ADD

    public static function form(Schema $schema): Schema
    {
        return MisiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MisisTable::configure($table);
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
            'index' => ListMisis::route('/'),
            'create' => CreateMisi::route('/create'),
            'edit' => EditMisi::route('/{record}/edit'),
        ];
    }
}
