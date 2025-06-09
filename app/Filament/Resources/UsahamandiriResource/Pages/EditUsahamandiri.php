<?php

namespace App\Filament\Resources\UsahamandiriResource\Pages;

use App\Filament\Resources\UsahamandiriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUsahamandiri extends EditRecord
{
    protected static string $resource = UsahamandiriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
