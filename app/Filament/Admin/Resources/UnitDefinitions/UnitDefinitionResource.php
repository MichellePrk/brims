<?php

namespace App\Filament\Admin\Resources\UnitDefinitions;

use App\Filament\Admin\Resources\UnitDefinitions\Pages\CreateUnitDefinition;
use App\Filament\Admin\Resources\UnitDefinitions\Pages\EditUnitDefinition;
use App\Filament\Admin\Resources\UnitDefinitions\Pages\ListUnitDefinitions;
use App\Filament\Admin\Resources\UnitDefinitions\Pages\ViewUnitDefinition;
use App\Filament\Admin\Resources\UnitDefinitions\Schemas\UnitDefinitionForm;
use App\Filament\Admin\Resources\UnitDefinitions\Schemas\UnitDefinitionInfolist;
use App\Filament\Admin\Resources\UnitDefinitions\Tables\UnitDefinitionsTable;
use App\Models\UnitDefinition;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class UnitDefinitionResource extends Resource
{
    #[\Override]
    protected static ?string $model = UnitDefinition::class;

    #[\Override]
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    #[\Override]
    protected static ?string $recordTitleAttribute = 'name';

    #[\Override]
    protected static string | UnitEnum | null $navigationGroup = 'Storage';

    #[\Override]
    protected static ?int $navigationSort = 1;

    #[\Override]
    public static function form(Schema $schema): Schema
    {
        return UnitDefinitionForm::configure($schema);
    }

    #[\Override]
    public static function infolist(Schema $schema): Schema
    {
        return UnitDefinitionInfolist::configure($schema);
    }

    #[\Override]
    public static function table(Table $table): Table
    {
        return UnitDefinitionsTable::configure($table);
    }

    #[\Override]
    public static function getRelations(): array
    {
        return [];
    }

    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => ListUnitDefinitions::route('/'),
            'create' => CreateUnitDefinition::route('/create'),
            'view' => ViewUnitDefinition::route('/{record}'),
            'edit' => EditUnitDefinition::route('/{record}/edit'),
        ];
    }
}
