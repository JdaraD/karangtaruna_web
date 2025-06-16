<?php

namespace App\Filament\Resources\SliderbrandaResource\Pages;

use App\Filament\Resources\SliderbrandaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSliderbranda extends EditRecord
{
    protected static string $resource = SliderbrandaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
