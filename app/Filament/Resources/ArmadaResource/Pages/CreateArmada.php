<?php

namespace App\Filament\Resources\ArmadaResource\Pages;

use App\Filament\Resources\ArmadaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateArmada extends CreateRecord
{
    protected static string $resource = ArmadaResource::class;
    protected ?string $refdirectUrl = null;
    protected function getRedirectUrl(): string
    {
        return $this->refdirectUrl ?? $this->getResource()::getUrl('index');
    }
}
