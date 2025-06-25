<?php

namespace App\Filament\Resources\PengajuanBantuanResource\Pages;

use App\Filament\Resources\PengajuanBantuanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengajuanBantuans extends ListRecords
{
    protected static string $resource = PengajuanBantuanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
