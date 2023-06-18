<?php

namespace App\Filament\Resources\TeamResource\Pages;

use App\Models\Player;
use Filament\Pages\Actions;
use App\Filament\Resources\TeamResource;
use Filament\Resources\Pages\EditRecord;

class EditTeam extends EditRecord
{
    protected static string $resource = TeamResource::class;

    protected function getActions(): array
    {
        $team = $this->record;
        $playersCount = Player::where('team_id', $team->id)->count();

        if($playersCount > 0) {
            return [Actions\DeleteAction::make()->disabled()->label('Törléshez előbb töröld az összes, ehhez a csapathoz tartozó játékost'),];
        }

        return [Actions\DeleteAction::make(),];
    }

    public function getTitle(): string
    {
        return 'Csapat szerkesztése';
    }

    protected function getRedirectUrl(): string {
        return $this->getResource()::getUrl('index');
    }
}
