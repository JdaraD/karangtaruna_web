<?php

namespace App\Filament\Resources\KolaborasiResource\Pages;

use App\Filament\Resources\KolaborasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKolaborasi extends EditRecord
{
    protected static string $resource = KolaborasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
