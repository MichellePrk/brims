<?php

namespace App\Filament\Project\Resources\Projects\Resources\Sites;

use App\Filament\Project\Resources\Projects\ProjectResource;
use App\Filament\Project\Resources\Projects\Resources\Sites\Pages\CreateSite;
use App\Filament\Project\Resources\Projects\Resources\Sites\Pages\EditSite;
use App\Filament\Project\Resources\Projects\Resources\Sites\Schemas\SiteForm;
use App\Filament\Project\Resources\Projects\Resources\Sites\Tables\SitesTable;
use App\Models\Site;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SiteResource extends Resource
{
    #[\Override]
    protected static ?string $model = Site::class;

    #[\Override]
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    #[\Override]
    protected static ?string $parentResource = ProjectResource::class;

    #[\Override]
    public static function form(Schema $schema): Schema
    {
        return SiteForm::configure($schema);
    }

    #[\Override]
    public static function table(Table $table): Table
    {
        return SitesTable::configure($table);
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
            'create' => CreateSite::route('/create'),
            'edit' => EditSite::route('/{record}/edit'),
        ];
    }
}
