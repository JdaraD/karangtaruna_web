<?php

namespace App\Filament\Resources\MVideoResource\Pages;

use App\Filament\Resources\MVideoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMVideos extends ListRecords
{
    protected static string $resource = MVideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
