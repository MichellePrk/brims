<?php

namespace App\Filament\App\Resources\Projects;

use App\Filament\App\Resources\Projects\Pages\ListProjects;
use App\Filament\App\Resources\Projects\Tables\ProjectsTable;
use App\Models\Project;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    #[\Override]
    protected static ?string $model = Project::class;

    #[\Override]
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    #[\Override]
    public static ?int $navigationSort = 1;

    #[\Override]
    protected static ?string $recordTitleAttribute = 'title';

    #[\Override]
    public static function table(Table $table): Table
    {
        return ProjectsTable::configure($table);
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
            'index' => ListProjects::route('/'),
        ];
    }
}
