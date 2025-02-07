<?php

namespace App\Filament\Resources\DetailorderResource\Pages;

use App\Filament\Resources\DetailorderResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDetailorder extends ViewRecord
{
    protected static string $resource = DetailorderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
