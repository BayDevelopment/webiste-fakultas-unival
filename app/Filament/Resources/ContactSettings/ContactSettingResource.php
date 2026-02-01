<?php

namespace App\Filament\Resources\ContactSettings;

use App\Filament\Resources\ContactSettings\Pages\CreateContactSetting;
use App\Filament\Resources\ContactSettings\Pages\EditContactSetting;
use App\Filament\Resources\ContactSettings\Pages\ListContactSettings;
use App\Filament\Resources\ContactSettings\Schemas\ContactSettingForm;
use App\Filament\Resources\ContactSettings\Tables\ContactSettingsTable;
use App\Models\ContactSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ContactSettingResource extends Resource
{
    protected static ?string $model = ContactSetting::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-phone';

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
        return 'Pengaturan Kontak';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Data Pengaturan Kontak';
    }
    protected static ?string $navigationLabel = 'Pengaturan Kontak';
    protected static ?int    $navigationSort  = 15;
    // LAST ADD

    public static function form(Schema $schema): Schema
    {
        return ContactSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContactSettingsTable::configure($table);
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
            'index' => ListContactSettings::route('/'),
            'create' => CreateContactSetting::route('/create'),
            'edit' => EditContactSetting::route('/{record}/edit'),
        ];
    }
}
