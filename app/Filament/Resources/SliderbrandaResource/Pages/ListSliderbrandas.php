<?php

namespace App\Filament\Resources\SliderbrandaResource\Pages;

use App\Filament\Resources\SliderbrandaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSliderbrandas extends ListRecords
{
    protected static string $resource = SliderbrandaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
