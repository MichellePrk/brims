<?php

namespace App\Filament\Project\Resources\Publications\Pages;

use App\Filament\Project\Resources\Publications\PublicationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPublication extends ViewRecord
{
    #[\Override]
    protected static string $resource = PublicationResource::class;

    #[\Override]
    protected static ?string $title = 'Publication Details';

    #[\Override]
    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
