<?php

namespace App\Filament\Resources\KolaborasiResource\Pages;

use App\Filament\Resources\KolaborasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKolaborasis extends ListRecords
{
    protected static string $resource = KolaborasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
