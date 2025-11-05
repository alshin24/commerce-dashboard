<?php

namespace App\Filament\Resources\Details\Pages;

use App\Filament\Resources\Details\DetailResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDetails extends ListRecords
{
    protected static string $resource = DetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
