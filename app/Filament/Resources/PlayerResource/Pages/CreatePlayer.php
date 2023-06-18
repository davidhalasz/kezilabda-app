<?php

namespace App\Filament\Resources\PlayerResource\Pages;

use App\Filament\Resources\PlayerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePlayer extends CreateRecord
{
    protected static string $resource = PlayerResource::class;

    public function getTitle(): string
    {
        return 'Új játékos';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
