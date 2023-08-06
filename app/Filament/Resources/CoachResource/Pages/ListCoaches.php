<?php

namespace App\Filament\Resources\CoachResource\Pages;

use App\Filament\Resources\CoachResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCoaches extends ListRecords
{
    protected static string $resource = CoachResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Új hozzáadása'),
        ];
    }

    public function getTitle(): string
    {
        return 'Edzők';
    }
}
