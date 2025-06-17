<?php

namespace App\Filament\Resources\MenukolaborasiResource\Pages;

use App\Filament\Resources\MenukolaborasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMenukolaborasi extends EditRecord
{
    protected static string $resource = MenukolaborasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
