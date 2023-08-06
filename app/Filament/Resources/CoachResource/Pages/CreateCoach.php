<?php

namespace App\Filament\Resources\CoachResource\Pages;

use App\Filament\Resources\CoachResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCoach extends CreateRecord
{
    protected static string $resource = CoachResource::class;

    public function getTitle(): string
    {
        return 'Új Edző';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
