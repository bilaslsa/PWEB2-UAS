<?php

namespace App\Filament\Resources\PembayaranResource\Pages;

use App\Filament\Resources\PembayaranResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePembayaran extends CreateRecord
{
    protected static string $resource = PembayaranResource::class;
    protected ?string $refdirectUrl = null;
    protected function getRedirectUrl(): string
    {
        return $this->refdirectUrl ?? $this->getResource()::getUrl('index');
    }
}
