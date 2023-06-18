<?php

namespace App\Filament\Resources\PlayerResource\Pages;

use Filament\Pages\Actions;
use Filament\Pages\Actions\Action;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\PlayerResource;

class EditPlayer extends EditRecord
{
    protected static string $resource = PlayerResource::class;

    protected function getActions(): array
    {
        $player = $this->record;

        return [
            Action::make('Törlés')
                    ->action(function () use ($player) {
                        if(Storage::exists('public/'.$player->avatar)) {
                            Storage::delete('public/'.$player->avatar);
                        }
                        $player->delete();
                        return redirect('/admin/players');
                    })

                    ->color('danger')
                    ->modalHeading('Biztos törölni szeretnéd a farmlakót?')
                    ->requiresConfirmation()
        ];
    }

    protected function getFormActions(): array
    {
        return [
            $this->getSaveFormAction()->label('Változtatások mentése'),
            $this->getCancelFormAction()->label('Mégsem')
        ];
    }

    public function getTitle(): string
    {
        return 'Játékos szerkesztése';
    }

    protected function getRedirectUrl(): string {
        return $this->getResource()::getUrl('index');
    }
}
