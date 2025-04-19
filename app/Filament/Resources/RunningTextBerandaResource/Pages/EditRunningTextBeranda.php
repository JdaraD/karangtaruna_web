<?php

namespace App\Filament\Resources\RunningTextBerandaResource\Pages;

use App\Filament\Resources\RunningTextBerandaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRunningTextBeranda extends EditRecord
{
    protected static string $resource = RunningTextBerandaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
