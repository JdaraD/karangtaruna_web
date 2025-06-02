<?php

namespace App\Filament\Resources\NomortambahanResource\Pages;

use App\Filament\Resources\NomortambahanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNomortambahan extends EditRecord
{
    protected static string $resource = NomortambahanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
