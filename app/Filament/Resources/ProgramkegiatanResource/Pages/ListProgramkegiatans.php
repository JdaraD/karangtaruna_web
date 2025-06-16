<?php

namespace App\Filament\Resources\ProgramkegiatanResource\Pages;

use App\Filament\Resources\ProgramkegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProgramkegiatans extends ListRecords
{
    protected static string $resource = ProgramkegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
