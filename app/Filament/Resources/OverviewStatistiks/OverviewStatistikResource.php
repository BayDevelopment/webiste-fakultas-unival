<?php

namespace App\Filament\Resources\OverviewStatistiks;

use App\Filament\Resources\OverviewStatistiks\Pages\CreateOverviewStatistik;
use App\Filament\Resources\OverviewStatistiks\Pages\EditOverviewStatistik;
use App\Filament\Resources\OverviewStatistiks\Pages\ListOverviewStatistiks;
use App\Filament\Resources\OverviewStatistiks\Schemas\OverviewStatistikForm;
use App\Filament\Resources\OverviewStatistiks\Tables\OverviewStatistiksTable;
use App\Models\OverviewStatistik;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OverviewStatistikResource extends Resource
{
    protected static ?string $model = OverviewStatistik::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $recordTitleAttribute = 'key';

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
        return 'Overview Statistik';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Data Overview Statistik';
    }
    protected static ?string $navigationLabel = 'Overview Statistik';
    protected static ?int    $navigationSort  = 12;
    // LAST ADD

    public static function form(Schema $schema): Schema
    {
        return OverviewStatistikForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OverviewStatistiksTable::configure($table);
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
            'index' => ListOverviewStatistiks::route('/'),
            'create' => CreateOverviewStatistik::route('/create'),
            'edit' => EditOverviewStatistik::route('/{record}/edit'),
        ];
    }
}
