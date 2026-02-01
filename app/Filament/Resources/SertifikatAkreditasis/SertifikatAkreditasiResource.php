<?php

namespace App\Filament\Resources\SertifikatAkreditasis;

use App\Filament\Resources\SertifikatAkreditasis\Pages\CreateSertifikatAkreditasi;
use App\Filament\Resources\SertifikatAkreditasis\Pages\EditSertifikatAkreditasi;
use App\Filament\Resources\SertifikatAkreditasis\Pages\ListSertifikatAkreditasis;
use App\Filament\Resources\SertifikatAkreditasis\Schemas\SertifikatAkreditasiForm;
use App\Filament\Resources\SertifikatAkreditasis\Tables\SertifikatAkreditasisTable;
use App\Models\SertifikatAkreditasi;
use App\Models\SertifikatAkreditasiModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SertifikatAkreditasiResource extends Resource
{
    protected static ?string $model = SertifikatAkreditasiModel::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $recordTitleAttribute = 'prodi';

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
        return 'Sertifikat Akreditasi';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Data Sertifikat Akreditasi';
    }
    protected static ?string $navigationLabel = 'Sertifikat Akreditasi';
    protected static ?int    $navigationSort  = 21;
    // LAST ADD

    public static function form(Schema $schema): Schema
    {
        return SertifikatAkreditasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SertifikatAkreditasisTable::configure($table);
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
            'index' => ListSertifikatAkreditasis::route('/'),
            'create' => CreateSertifikatAkreditasi::route('/create'),
            'edit' => EditSertifikatAkreditasi::route('/{record}/edit'),
        ];
    }
}
