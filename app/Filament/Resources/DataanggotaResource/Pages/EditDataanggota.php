<?php

namespace App\Filament\Resources\DataanggotaResource\Pages;

use App\Filament\Resources\DataanggotaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataanggota extends EditRecord
{
    protected static string $resource = DataanggotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
