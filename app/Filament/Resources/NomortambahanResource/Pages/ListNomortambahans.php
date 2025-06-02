<?php

namespace App\Filament\Resources\NomortambahanResource\Pages;

use App\Filament\Resources\NomortambahanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNomortambahans extends ListRecords
{
    protected static string $resource = NomortambahanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
