<?php

namespace App\Filament\Project\Resources\Subjects\Pages;

use App\Filament\Project\Resources\Subjects\SubjectResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSubject extends CreateRecord
{
    #[\Override]
    protected static string $resource = SubjectResource::class;
}
