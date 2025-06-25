<?php

namespace App\Filament\Resources\ColorsettingResource\Pages;

use App\Filament\Resources\ColorsettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListColorsettings extends ListRecords
{
    protected static string $resource = ColorsettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
