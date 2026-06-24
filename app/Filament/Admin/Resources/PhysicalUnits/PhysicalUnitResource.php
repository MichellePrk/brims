<?php

namespace App\Filament\Admin\Resources\PhysicalUnits;

use App\Filament\Admin\Resources\PhysicalUnits\Pages\ListPhysicalUnits;
use App\Filament\Admin\Resources\PhysicalUnits\Pages\ViewPhysicalUnit;
use App\Filament\Admin\Resources\PhysicalUnits\RelationManagers\VirtualUnitsRelationManager;
use App\Filament\Admin\Resources\PhysicalUnits\Schemas\PhysicalUnitForm;
use App\Filament\Admin\Resources\PhysicalUnits\Schemas\PhysicalUnitInfolist;
use App\Filament\Admin\Resources\PhysicalUnits\Tables\PhysicalUnitsTable;
use App\Models\PhysicalUnit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PhysicalUnitResource extends Resource
{
    #[\Override]
    protected static ?string $model = PhysicalUnit::class;

    #[\Override]
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    #[\Override]
    protected static ?string $recordTitleAttribute = 'name';

    #[\Override]
    protected static string | UnitEnum | null $navigationGroup = 'Storage';

    #[\Override]
    protected static ?int $navigationSort = 2;

    #[\Override]
    public static function form(Schema $schema): Schema
    {
        return PhysicalUnitForm::configure($schema);
    }

    #[\Override]
    public static function infolist(Schema $schema): Schema
    {
        return PhysicalUnitInfolist::configure($schema);
    }

    #[\Override]
    public static function table(Table $table): Table
    {
        return PhysicalUnitsTable::configure($table);
    }

    #[\Override]
    public static function getRelations(): array
    {
        return [
            VirtualUnitsRelationManager::class,
        ];
    }

    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => ListPhysicalUnits::route('/'),
            'view' => ViewPhysicalUnit::route('/{record}'),
        ];
    }
}
