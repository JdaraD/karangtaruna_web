<?php

namespace App\Filament\Resources\HukumResource\Pages;

use App\Filament\Resources\HukumResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHukum extends EditRecord
{
    protected static string $resource = HukumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
