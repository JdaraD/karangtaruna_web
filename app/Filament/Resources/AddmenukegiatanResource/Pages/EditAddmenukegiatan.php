<?php

namespace App\Filament\Resources\AddmenukegiatanResource\Pages;

use App\Filament\Resources\AddmenukegiatanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAddmenukegiatan extends EditRecord
{
    protected static string $resource = AddmenukegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
