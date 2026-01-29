<?php

namespace App\Filament\Resources\NilaiUtamas;

use App\Filament\Resources\NilaiUtamas\Pages\CreateNilaiUtama;
use App\Filament\Resources\NilaiUtamas\Pages\EditNilaiUtama;
use App\Filament\Resources\NilaiUtamas\Pages\ListNilaiUtamas;
use App\Filament\Resources\NilaiUtamas\Schemas\NilaiUtamaForm;
use App\Filament\Resources\NilaiUtamas\Tables\NilaiUtamasTable;
use App\Models\NilaiUtama;
use App\Models\NilaiUtamaModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class NilaiUtamaResource extends Resource
{
    protected static ?string $model = NilaiUtamaModel::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-light-bulb';

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
        return 'Nilai Utama';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Data Nilai Utama';
    }
    protected static ?string $navigationLabel = 'Nilai Utama';
    protected static ?int    $navigationSort  = 10;
    // LAST ADD

    public static function form(Schema $schema): Schema
    {
        return NilaiUtamaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NilaiUtamasTable::configure($table);
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
            'index' => ListNilaiUtamas::route('/'),
            'create' => CreateNilaiUtama::route('/create'),
            'edit' => EditNilaiUtama::route('/{record}/edit'),
        ];
    }
}
