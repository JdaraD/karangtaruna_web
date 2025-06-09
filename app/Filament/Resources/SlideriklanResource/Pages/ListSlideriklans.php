<?php

namespace App\Filament\Resources\SlideriklanResource\Pages;

use App\Filament\Resources\SlideriklanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSlideriklans extends ListRecords
{
    protected static string $resource = SlideriklanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
