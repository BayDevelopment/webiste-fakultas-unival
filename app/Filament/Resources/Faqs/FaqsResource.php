<?php

namespace App\Filament\Resources\Faqs;

use App\Filament\Resources\Faqs\Pages\CreateFaqs;
use App\Filament\Resources\Faqs\Pages\EditFaqs;
use App\Filament\Resources\Faqs\Pages\ListFaqs;
use App\Filament\Resources\Faqs\Schemas\FaqsForm;
use App\Filament\Resources\Faqs\Tables\FaqsTable;
use App\Models\Faqs;
use App\Models\FaqsModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FaqsResource extends Resource
{
    protected static ?string $model = FaqsModel::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $recordTitleAttribute = 'question';

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
        return 'Faqs';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Data Faqs';
    }
    protected static ?string $navigationLabel = 'Faqs';
    protected static ?int    $navigationSort  = 16;
    // LAST ADD

    public static function form(Schema $schema): Schema
    {
        return FaqsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FaqsTable::configure($table);
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
            'index' => ListFaqs::route('/'),
            'create' => CreateFaqs::route('/create'),
            'edit' => EditFaqs::route('/{record}/edit'),
        ];
    }
}
