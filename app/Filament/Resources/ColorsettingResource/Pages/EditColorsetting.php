<?php

namespace App\Filament\Resources\ColorsettingResource\Pages;

use App\Filament\Resources\ColorsettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditColorsetting extends EditRecord
{
    protected static string $resource = ColorsettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
