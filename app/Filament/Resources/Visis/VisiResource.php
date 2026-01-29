<?php

namespace App\Filament\Resources\Visis;

use App\Filament\Resources\Visis\Pages\CreateVisi;
use App\Filament\Resources\Visis\Pages\EditVisi;
use App\Filament\Resources\Visis\Pages\ListVisis;
use App\Filament\Resources\Visis\Schemas\VisiForm;
use App\Filament\Resources\Visis\Tables\VisisTable;
use App\Models\Visi;
use App\Models\VisiModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VisiResource extends Resource
{
    protected static ?string $model = VisiModel::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-eye';

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
        return 'Visi';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Data Visi';
    }
    protected static ?string $navigationLabel = 'Visi';
    protected static ?int    $navigationSort  = 5;
    // LAST ADD

    public static function form(Schema $schema): Schema
    {
        return VisiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VisisTable::configure($table);
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
            'index' => ListVisis::route('/'),
            'create' => CreateVisi::route('/create'),
            'edit' => EditVisi::route('/{record}/edit'),
        ];
    }
}
