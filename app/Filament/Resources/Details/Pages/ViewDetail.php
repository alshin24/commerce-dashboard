<?php

namespace App\Filament\Resources\Details\Pages;

use App\Filament\Resources\Details\DetailResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDetail extends ViewRecord
{
    protected static string $resource = DetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
