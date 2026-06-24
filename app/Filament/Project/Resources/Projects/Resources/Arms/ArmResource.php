<?php

namespace App\Filament\Project\Resources\Projects\Resources\Arms;

use App\Filament\Project\Resources\Projects\ProjectResource;
use App\Filament\Project\Resources\Projects\Resources\Arms\Pages\ViewArm;
use App\Filament\Project\Resources\Projects\Resources\Arms\Schemas\ArmForm;
use App\Filament\Project\Resources\Projects\Resources\Arms\Schemas\ArmInfolist;
use App\Filament\Project\Resources\Projects\Resources\Arms\Tables\ArmsTable;
use App\Models\Arm;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ArmResource extends Resource
{
    #[\Override]
    protected static ?string $model = Arm::class;

    #[\Override]
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    #[\Override]
    protected static ?string $parentResource = ProjectResource::class;

    #[\Override]
    public static function form(Schema $schema): Schema
    {
        return ArmForm::configure($schema);
    }

    #[\Override]
    public static function table(Table $table): Table
    {
        return ArmsTable::configure($table);
    }

    #[\Override]
    public static function infolist(Schema $schema): Schema
    {
        return ArmInfolist::configure($schema);
    }

    #[\Override]
    public static function getRelations(): array
    {
        return [
            RelationManagers\EventsRelationManager::class,
        ];
    }

    #[\Override]
    public static function getPages(): array
    {
        return [
            'view' => ViewArm::route('/{record}'),
        ];
    }
}
