<?php

namespace App\Filament\Resources\FotoStrukturResource\Pages;

use App\Filament\Resources\FotoStrukturResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFotoStrukturs extends ListRecords
{
    protected static string $resource = FotoStrukturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
