<?php

namespace App\Filament\Resources\PasalResource\Pages;

use App\Filament\Resources\PasalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPasal extends EditRecord
{
    protected static string $resource = PasalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
