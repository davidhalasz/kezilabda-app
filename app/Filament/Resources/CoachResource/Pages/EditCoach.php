<?php

namespace App\Filament\Resources\CoachResource\Pages;

use Filament\Pages\Actions;
use Filament\Pages\Actions\Action;
use Illuminate\Support\Facades\Storage;
use App\Filament\Resources\CoachResource;
use Filament\Resources\Pages\EditRecord;

class EditCoach extends EditRecord
{
    protected static string $resource = CoachResource::class;

    protected function getActions(): array
    {
        $coach = $this->record;

        return [
            Action::make('Törlés')
                    ->action(function () use ($coach) {
                        if(Storage::exists('public/'.$coach->avatar)) {
                            Storage::delete('public/'.$coach->avatar);
                        }
                        $coach->delete();
                        return redirect('/admin/coaches');
                    })

                    ->color('danger')
                    ->modalHeading('Biztos törölni szeretnéd az edzőt?')
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
        return 'Edző adatainak szerkesztése';
    }

    protected function getRedirectUrl(): string {
        return $this->getResource()::getUrl('index');
    }
}
