<?php

namespace App\Filament\Resources\DetailorderResource\Pages;

use App\Filament\Resources\DetailorderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDetailorder extends EditRecord
{
    protected static string $resource = DetailorderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
