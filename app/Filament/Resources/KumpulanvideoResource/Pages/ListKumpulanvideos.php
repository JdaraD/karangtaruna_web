<?php

namespace App\Filament\Resources\KumpulanvideoResource\Pages;

use App\Filament\Resources\KumpulanvideoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKumpulanvideos extends ListRecords
{
    protected static string $resource = KumpulanvideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
