<?php

namespace App\Filament\Resources\ProdukResource\Pages;

use App\Filament\Resources\ProdukResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;


class CreateProduk extends CreateRecord
{
    protected static string $resource = ProdukResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
        ->success()
        ->icon('heroicon-o-plus-circle')
        ->title('Produk dibuat')
        ->body('Data Produk Telah Berhasil Dibuat');
    }

    protected function getRedirectUrl(): string
        {
            return $this->previousUrl ?? $this->getResource()::getUrl('index');
        }

}
