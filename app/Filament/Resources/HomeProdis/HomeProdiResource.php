<?php

namespace App\Filament\Resources\HomeProdis;

use App\Filament\Resources\HomeProdis\Pages\CreateHomeProdi;
use App\Filament\Resources\HomeProdis\Pages\EditHomeProdi;
use App\Filament\Resources\HomeProdis\Pages\ListHomeProdis;
use App\Filament\Resources\HomeProdis\Schemas\HomeProdiForm;
use App\Filament\Resources\HomeProdis\Tables\HomeProdisTable;
use App\Models\HomeProdi;
use App\Models\ProdiHomeModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HomeProdiResource extends Resource
{
    protected static ?string $model = ProdiHomeModel::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';

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
        return 'Homeprodi';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Data Homeprodi';
    }
    protected static ?string $navigationLabel = 'Homeprodi';
    protected static ?int    $navigationSort  = 8;
    // LAST ADD

    public static function form(Schema $schema): Schema
    {
        return HomeProdiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeProdisTable::configure($table);
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
            'index' => ListHomeProdis::route('/'),
            'create' => CreateHomeProdi::route('/create'),
            'edit' => EditHomeProdi::route('/{record}/edit'),
        ];
    }
}
