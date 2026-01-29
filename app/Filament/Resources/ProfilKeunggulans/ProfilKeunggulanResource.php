<?php

namespace App\Filament\Resources\ProfilKeunggulans;

use App\Filament\Resources\ProfilKeunggulans\Pages\CreateProfilKeunggulan;
use App\Filament\Resources\ProfilKeunggulans\Pages\EditProfilKeunggulan;
use App\Filament\Resources\ProfilKeunggulans\Pages\ListProfilKeunggulans;
use App\Filament\Resources\ProfilKeunggulans\Schemas\ProfilKeunggulanForm;
use App\Filament\Resources\ProfilKeunggulans\Tables\ProfilKeunggulansTable;
use App\Models\ProfilKeunggulan;
use App\Models\ProfilKeunggulanModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProfilKeunggulanResource extends Resource
{
    protected static ?string $model = ProfilKeunggulanModel::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-star';

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
        return 'Keunggulan Profil';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Data Keunggulan Profil';
    }
    protected static ?string $navigationLabel = 'Keunggulan Profil';
    protected static ?int    $navigationSort  = 5;
    // LAST ADD

    public static function form(Schema $schema): Schema
    {
        return ProfilKeunggulanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfilKeunggulansTable::configure($table);
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
            'index' => ListProfilKeunggulans::route('/'),
            'create' => CreateProfilKeunggulan::route('/create'),
            'edit' => EditProfilKeunggulan::route('/{record}/edit'),
        ];
    }
}
