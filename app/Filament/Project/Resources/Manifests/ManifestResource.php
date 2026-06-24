<?php

namespace App\Filament\Project\Resources\Manifests;

use App\Filament\Project\Resources\Manifests\Pages\CreateManifest;
use App\Filament\Project\Resources\Manifests\Pages\EditManifest;
use App\Filament\Project\Resources\Manifests\Pages\ListManifests;
use App\Filament\Project\Resources\Manifests\Pages\ViewManifest;
use App\Filament\Project\Resources\Manifests\Schemas\ManifestForm;
use App\Filament\Project\Resources\Manifests\Schemas\ManifestInfolist;
use App\Filament\Project\Resources\Manifests\Tables\ManifestsTable;
use App\Models\Manifest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ManifestResource extends Resource
{
    #[\Override]
    protected static ?string $model = Manifest::class;

    #[\Override]
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedNumberedList;

    #[\Override]
    protected static ?string $recordTitleAttribute = 'created_at';

    #[\Override]
    public static ?int $navigationSort = 8;

    #[\Override]
    public static function form(Schema $schema): Schema
    {
        return ManifestForm::configure($schema);
    }

    #[\Override]
    public static function infolist(Schema $schema): Schema
    {
        return ManifestInfolist::configure($schema);
    }

    #[\Override]
    public static function table(Table $table): Table
    {
        return ManifestsTable::configure($table);
    }

    #[\Override]
    public static function getRelations(): array
    {
        return [
            RelationManagers\SpecimensRelationManager::class,
        ];
    }

    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => ListManifests::route('/'),
            'create' => CreateManifest::route('/create'),
            'view' => ViewManifest::route('/{record}'),
            'edit' => EditManifest::route('/{record}/edit'),
        ];
    }
}
