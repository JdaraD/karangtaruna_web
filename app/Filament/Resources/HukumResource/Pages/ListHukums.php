<?php

namespace App\Filament\Resources\HukumResource\Pages;

use App\Filament\Resources\HukumResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHukums extends ListRecords
{
    protected static string $resource = HukumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
