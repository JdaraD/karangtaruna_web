<?php

namespace App\Filament\Resources\AddmenukegiatanResource\Pages;

use App\Filament\Resources\AddmenukegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAddmenukegiatans extends ListRecords
{
    protected static string $resource = AddmenukegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
