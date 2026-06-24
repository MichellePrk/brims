<?php

namespace App\Filament\App\Resources\Teams\RelationManagers;

use App\Filament\App\Resources\Teams\Resources\Programmes\ProgrammeResource;
use Filament\Resources\RelationManagers\RelationManager;

class ProgrammesRelationManager extends RelationManager
{
    #[\Override]
    protected static string $relationship = 'programmes';

    #[\Override]
    protected static ?string $relatedResource = ProgrammeResource::class;

    #[\Override]
    public function isReadOnly(): bool
    {
        return false;
    }
}
