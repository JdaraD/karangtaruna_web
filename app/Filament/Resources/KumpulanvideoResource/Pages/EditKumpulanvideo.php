<?php

namespace App\Filament\Resources\KumpulanvideoResource\Pages;

use App\Filament\Resources\KumpulanvideoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKumpulanvideo extends EditRecord
{
    protected static string $resource = KumpulanvideoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
