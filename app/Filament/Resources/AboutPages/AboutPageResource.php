<?php

namespace App\Filament\Resources\AboutPages;

use App\Filament\Resources\AboutPages\Pages\CreateAboutPage;
use App\Filament\Resources\AboutPages\Pages\EditAboutPage;
use App\Filament\Resources\AboutPages\Pages\ListAboutPages;
use App\Filament\Resources\AboutPages\Schemas\AboutPageForm;
use App\Filament\Resources\AboutPages\Tables\AboutPagesTable;
use App\Models\about_pages_model;
use App\Models\AboutPage;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AboutPageResource extends Resource
{
    protected static ?string $model = about_pages_model::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $recordTitleAttribute = 'page_title';

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
        return 'About';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Data About';
    }
    protected static ?string $navigationLabel = 'About';
    protected static ?int    $navigationSort  = 2;
    // LAST ADD

    public static function form(Schema $schema): Schema
    {
        return AboutPageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AboutPagesTable::configure($table);
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
            'index' => ListAboutPages::route('/'),
            'create' => CreateAboutPage::route('/create'),
            'edit' => EditAboutPage::route('/{record}/edit'),
        ];
    }
}
