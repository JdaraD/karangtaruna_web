<?php

namespace App\Filament\Resources\PengajuanKegiatanResource\Pages;

use App\Filament\Resources\PengajuanKegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengajuanKegiatans extends ListRecords
{
    protected static string $resource = PengajuanKegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
