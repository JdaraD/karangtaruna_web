<?php

namespace App\Filament\Resources\RunningTextBerandaResource\Pages;

use App\Filament\Resources\RunningTextBerandaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRunningTextBerandas extends ListRecords
{
    protected static string $resource = RunningTextBerandaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
