<?php

namespace App\Filament\Resources\DetailorderResource\Pages;

use App\Filament\Resources\DetailorderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDetailorders extends ListRecords
{
    protected static string $resource = DetailorderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
