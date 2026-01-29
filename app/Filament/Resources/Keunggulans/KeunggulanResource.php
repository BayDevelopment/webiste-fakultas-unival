<?php

namespace App\Filament\Resources\Keunggulans;

use App\Filament\Resources\Keunggulans\Pages\CreateKeunggulan;
use App\Filament\Resources\Keunggulans\Pages\EditKeunggulan;
use App\Filament\Resources\Keunggulans\Pages\ListKeunggulans;
use App\Filament\Resources\Keunggulans\Schemas\KeunggulanForm;
use App\Filament\Resources\Keunggulans\Tables\KeunggulansTable;
use App\Models\Keunggulan;
use App\Models\KeunggulanModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KeunggulanResource extends Resource
{
    protected static ?string $model = KeunggulanModel::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-sparkles';

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
        return 'Keunggulan';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Data Keunggulan';
    }
    protected static ?string $navigationLabel = 'Keunggulan';
    protected static ?int    $navigationSort  = 3;
    // LAST ADD

    public static function form(Schema $schema): Schema
    {
        return KeunggulanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KeunggulansTable::configure($table);
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
            'index' => ListKeunggulans::route('/'),
            'create' => CreateKeunggulan::route('/create'),
            'edit' => EditKeunggulan::route('/{record}/edit'),
        ];
    }
}
