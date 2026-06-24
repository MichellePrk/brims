<?php

namespace App\Filament\Admin\Resources\UnitDefinitions\Pages;

use App\Filament\Admin\Resources\UnitDefinitions\UnitDefinitionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUnitDefinition extends CreateRecord
{
    #[\Override]
    protected static string $resource = UnitDefinitionResource::class;

    #[\Override]
    protected static bool $canCreateAnother = false;
}
