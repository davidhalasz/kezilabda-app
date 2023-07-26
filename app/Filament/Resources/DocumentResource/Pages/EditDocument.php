<?php

namespace App\Filament\Resources\DocumentResource\Pages;

use App\Filament\Resources\DocumentResource;
use Filament\Pages\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditDocument extends EditRecord
{
    protected static string $resource = DocumentResource::class;

    protected function getActions(): array
    {
        $document = $this->record;

        return [
            Action::make('Törlés')
                    ->action(function () use ($document) {
                        if(Storage::exists('public/'.$document->filepath)) {
                            Storage::delete('public/'.$document->filepath);
                        }
                        $document->delete();
                        return redirect('/admin/documents');
                    })

                    ->color('danger')
                    ->modalHeading('Biztos törölni szeretnéd a documentumot?')
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
        return 'Dokumentum szerkesztése';
    }

    protected function getRedirectUrl(): string {
        return $this->getResource()::getUrl('index');
    }
}
