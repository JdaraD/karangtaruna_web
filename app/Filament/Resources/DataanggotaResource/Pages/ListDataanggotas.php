<?php

namespace App\Filament\Resources\DataanggotaResource\Pages;

use App\Filament\Resources\DataanggotaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataanggotas extends ListRecords
{
    protected static string $resource = DataanggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
