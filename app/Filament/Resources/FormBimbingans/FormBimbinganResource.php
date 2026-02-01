<?php

namespace App\Filament\Resources\FormBimbingans;

use App\Filament\Resources\FormBimbingans\Pages\CreateFormBimbingan;
use App\Filament\Resources\FormBimbingans\Pages\EditFormBimbingan;
use App\Filament\Resources\FormBimbingans\Pages\ListFormBimbingans;
use App\Filament\Resources\FormBimbingans\Schemas\FormBimbinganForm;
use App\Filament\Resources\FormBimbingans\Tables\FormBimbingansTable;
use App\Models\FormBimbingan;
use App\Models\FormBimbinganModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FormBimbinganResource extends Resource
{
    protected static ?string $model = FormBimbinganModel::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $recordTitleAttribute = 'jenis_bimbingan';

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
        return 'Form Bimbingan';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Data Form Bimbingan';
    }
    protected static ?string $navigationLabel = 'Form Bimbingan';
    protected static ?int    $navigationSort  = 22;
    // LAST ADD

    public static function form(Schema $schema): Schema
    {
        return FormBimbinganForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FormBimbingansTable::configure($table);
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
            'index' => ListFormBimbingans::route('/'),
            'create' => CreateFormBimbingan::route('/create'),
            'edit' => EditFormBimbingan::route('/{record}/edit'),
        ];
    }
}
