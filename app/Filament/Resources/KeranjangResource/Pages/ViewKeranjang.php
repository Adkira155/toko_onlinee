<?php

namespace App\Filament\Resources\KeranjangResource\Pages;

use App\Filament\Resources\KeranjangResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKeranjang extends ViewRecord
{
    protected static string $resource = KeranjangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
