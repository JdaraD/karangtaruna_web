<?php

namespace App\Filament\Resources\UsahamandiriResource\Pages;

use App\Filament\Resources\UsahamandiriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsahamandiris extends ListRecords
{
    protected static string $resource = UsahamandiriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
