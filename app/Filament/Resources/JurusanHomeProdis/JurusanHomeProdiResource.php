<?php

namespace App\Filament\Resources\JurusanHomeProdis;

use App\Filament\Resources\JurusanHomeProdis\Pages\CreateJurusanHomeProdi;
use App\Filament\Resources\JurusanHomeProdis\Pages\EditJurusanHomeProdi;
use App\Filament\Resources\JurusanHomeProdis\Pages\ListJurusanHomeProdis;
use App\Filament\Resources\JurusanHomeProdis\Schemas\JurusanHomeProdiForm;
use App\Filament\Resources\JurusanHomeProdis\Tables\JurusanHomeProdisTable;
use App\Models\JurusanHomeProdi;
use App\Models\JurusanHomeProdiModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class JurusanHomeProdiResource extends Resource
{
    protected static ?string $model = JurusanHomeProdiModel::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-computer-desktop';

    protected static ?string $recordTitleAttribute = 'jenjang';

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
        return 'Prodi Home';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Data Prodi Home';
    }
    protected static ?string $navigationLabel = 'Prodi Home';
    protected static ?int    $navigationSort  = 9;
    // LAST ADD

    public static function form(Schema $schema): Schema
    {
        return JurusanHomeProdiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JurusanHomeProdisTable::configure($table);
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
            'index' => ListJurusanHomeProdis::route('/'),
            'create' => CreateJurusanHomeProdi::route('/create'),
            'edit' => EditJurusanHomeProdi::route('/{record}/edit'),
        ];
    }
}
