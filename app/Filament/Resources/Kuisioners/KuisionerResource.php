<?php

namespace App\Filament\Resources\Kuisioners;

use App\Filament\Resources\Kuisioners\Pages\CreateKuisioner;
use App\Filament\Resources\Kuisioners\Pages\EditKuisioner;
use App\Filament\Resources\Kuisioners\Pages\ListKuisioners;
use App\Filament\Resources\Kuisioners\Schemas\KuisionerForm;
use App\Filament\Resources\Kuisioners\Tables\KuisionersTable;
use App\Models\Kuisioner;
use App\Models\KuisionerUserModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KuisionerResource extends Resource
{
    protected static ?string $model = KuisionerUserModel::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $recordTitleAttribute = 'jenis_user';

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
        return 'Kuisioner';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Data Kuisioner';
    }
    protected static ?string $navigationLabel = 'Kuisioner';
    protected static ?int    $navigationSort  = 19;
    // LAST ADD

    public static function form(Schema $schema): Schema
    {
        return KuisionerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KuisionersTable::configure($table);
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
            'index' => ListKuisioners::route('/'),
            'create' => CreateKuisioner::route('/create'),
            'edit' => EditKuisioner::route('/{record}/edit'),
        ];
    }
}
