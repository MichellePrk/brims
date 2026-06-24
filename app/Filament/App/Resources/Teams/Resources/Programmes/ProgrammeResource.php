<?php

namespace App\Filament\App\Resources\Teams\Resources\Programmes;

use App\Filament\App\Resources\Teams\Resources\Programmes\Pages\CreateProgramme;
use App\Filament\App\Resources\Teams\Resources\Programmes\Pages\EditProgramme;
use App\Filament\App\Resources\Teams\Resources\Programmes\Pages\ViewProgramme;
use App\Filament\App\Resources\Teams\Resources\Programmes\Schemas\ProgrammeForm;
use App\Filament\App\Resources\Teams\Resources\Programmes\Schemas\ProgrammeInfolist;
use App\Filament\App\Resources\Teams\Resources\Programmes\Tables\ProgrammesTable;
use App\Filament\App\Resources\Teams\TeamResource;
use App\Models\Programme;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProgrammeResource extends Resource
{
    #[\Override]
    protected static ?string $model = Programme::class;

    #[\Override]
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    #[\Override]
    protected static ?string $parentResource = TeamResource::class;

    #[\Override]
    protected static ?string $recordTitleAttribute = 'name';

    #[\Override]
    public static function form(Schema $schema): Schema
    {
        return ProgrammeForm::configure($schema);
    }

    #[\Override]
    public static function infolist(Schema $schema): Schema
    {
        return ProgrammeInfolist::configure($schema);
    }

    #[\Override]
    public static function table(Table $table): Table
    {
        return ProgrammesTable::configure($table);
    }

    #[\Override]
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    #[\Override]
    public static function getPages(): array
    {
        return [
            'create' => CreateProgramme::route('/create'),
            'view' => ViewProgramme::route('/{record}'),
            'edit' => EditProgramme::route('/{record}/edit'),
        ];
    }
}
