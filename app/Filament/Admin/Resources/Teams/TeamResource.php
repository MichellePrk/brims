<?php

namespace App\Filament\Admin\Resources\Teams;

use App\Filament\Admin\Resources\Teams\Pages\CreateTeam;
use App\Filament\Admin\Resources\Teams\Pages\EditTeam;
use App\Filament\Admin\Resources\Teams\Pages\ListTeams;
use App\Filament\Admin\Resources\Teams\Pages\ViewTeam;
use App\Filament\Admin\Resources\Teams\Schemas\TeamForm;
use App\Filament\Admin\Resources\Teams\Schemas\TeamInfolist;
use App\Filament\Admin\Resources\Teams\Tables\TeamsTable;
use App\Models\Team;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class TeamResource extends Resource
{
    #[\Override]
    protected static ?string $model = Team::class;

    #[\Override]
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    #[\Override]
    protected static string | UnitEnum | null $navigationGroup = 'User Management';

    #[\Override]
    protected static ?int $navigationSort = 2;

    #[\Override]
    protected static ?string $recordTitleAttribute = 'name';

    #[\Override]
    public static function form(Schema $schema): Schema
    {
        return TeamForm::configure($schema);
    }

    #[\Override]
    public static function infolist(Schema $schema): Schema
    {
        return TeamInfolist::configure($schema);
    }

    #[\Override]
    public static function table(Table $table): Table
    {
        return TeamsTable::configure($table);
    }

    #[\Override]
    public static function getRelations(): array
    {
        return [
            RelationManagers\MembersRelationManager::class,
            RelationManagers\ProjectsRelationManager::class,
        ];
    }

    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => ListTeams::route('/'),
            'create' => CreateTeam::route('/create'),
            'view' => ViewTeam::route('/{record}'),
            'edit' => EditTeam::route('/{record}/edit'),
        ];
    }
}
