<?php

namespace App\Filament\Resources\ChatWas;

use App\Filament\Resources\ChatWas\Pages\CreateChatWa;
use App\Filament\Resources\ChatWas\Pages\EditChatWa;
use App\Filament\Resources\ChatWas\Pages\ListChatWas;
use App\Filament\Resources\ChatWas\Schemas\ChatWaForm;
use App\Filament\Resources\ChatWas\Tables\ChatWasTable;
use App\Models\ChatWa;
use App\Models\ChatWaModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ChatWaResource extends Resource
{
    protected static ?string $model = ChatWaModel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    // ADD
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Settings';
    }
    public static function getModelLabel(): string
    {
        return 'ChatBot';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Data ChatBot';
    }
    protected static ?string $navigationLabel = 'ChatBot';
    protected static ?int    $navigationSort  = 2;
    // LAST ADD

    public static function form(Schema $schema): Schema
    {
        return ChatWaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ChatWasTable::configure($table);
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
            'index' => ListChatWas::route('/'),
            'create' => CreateChatWa::route('/create'),
            'edit' => EditChatWa::route('/{record}/edit'),
        ];
    }
}
