<?php

namespace App\Filament\Resources\Profils;

use App\Filament\Resources\Profils\Pages\CreateProfil;
use App\Filament\Resources\Profils\Pages\EditProfil;
use App\Filament\Resources\Profils\Pages\ListProfils;
use App\Filament\Resources\Profils\Schemas\ProfilForm;
use App\Filament\Resources\Profils\Tables\ProfilsTable;
use App\Models\Profil;
use App\Models\ProfilModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProfilResource extends Resource
{
    protected static ?string $model = ProfilModel::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

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
        return 'Profil';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Data Profil';
    }
    protected static ?string $navigationLabel = 'Profil';
    protected static ?int    $navigationSort  = 4;
    // LAST ADD

    public static function form(Schema $schema): Schema
    {
        return ProfilForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfilsTable::configure($table);
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
            'index' => ListProfils::route('/'),
            'create' => CreateProfil::route('/create'),
            'edit' => EditProfil::route('/{record}/edit'),
        ];
    }
}
