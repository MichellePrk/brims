<?php

namespace App\Filament\App\Resources\Teams\Resources\Programmes\Pages;

use App\Filament\App\Resources\Teams\Resources\Programmes\ProgrammeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProgramme extends CreateRecord
{
    #[\Override]
    protected static string $resource = ProgrammeResource::class;
}
