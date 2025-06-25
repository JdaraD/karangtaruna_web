<?php

namespace App\Filament\Resources\PengajuanBantuanResource\Pages;

use App\Filament\Resources\PengajuanBantuanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengajuanBantuan extends EditRecord
{
    protected static string $resource = PengajuanBantuanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
