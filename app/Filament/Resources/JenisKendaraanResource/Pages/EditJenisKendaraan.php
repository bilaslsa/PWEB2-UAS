<?php

namespace App\Filament\Resources\JenisKendaraanResource\Pages;

use App\Filament\Resources\JenisKendaraanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisKendaraan extends EditRecord
{
    protected static string $resource = JenisKendaraanResource::class;
    protected ?string $refdirectUrl = null;
    protected function getRedirectUrl(): string
    {
        return $this->refdirectUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
