<?php

namespace App\Filament\Resources\SlideriklanResource\Pages;

use App\Filament\Resources\SlideriklanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSlideriklan extends EditRecord
{
    protected static string $resource = SlideriklanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
