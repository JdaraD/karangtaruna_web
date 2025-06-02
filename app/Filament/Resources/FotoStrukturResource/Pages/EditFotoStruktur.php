<?php

namespace App\Filament\Resources\FotoStrukturResource\Pages;

use App\Filament\Resources\FotoStrukturResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFotoStruktur extends EditRecord
{
    protected static string $resource = FotoStrukturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
