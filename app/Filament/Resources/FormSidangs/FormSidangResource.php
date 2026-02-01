<?php

namespace App\Filament\Resources\FormSidangs;

use App\Filament\Resources\FormSidangs\Pages\CreateFormSidang;
use App\Filament\Resources\FormSidangs\Pages\EditFormSidang;
use App\Filament\Resources\FormSidangs\Pages\ListFormSidangs;
use App\Filament\Resources\FormSidangs\Schemas\FormSidangForm;
use App\Filament\Resources\FormSidangs\Tables\FormSidangsTable;
use App\Models\FormSidang;
use App\Models\FormSidangModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FormSidangResource extends Resource
{
    protected static ?string $model = FormSidangModel::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-check';

    protected static ?string $recordTitleAttribute = 'jenis_sidang';

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
        return 'Form Sidang';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Data Form Sidang';
    }
    protected static ?string $navigationLabel = 'Form Sidang';
    protected static ?int    $navigationSort  = 20;
    // LAST ADD

    public static function form(Schema $schema): Schema
    {
        return FormSidangForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FormSidangsTable::configure($table);
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
            'index' => ListFormSidangs::route('/'),
            'create' => CreateFormSidang::route('/create'),
            'edit' => EditFormSidang::route('/{record}/edit'),
        ];
    }
}
