<?php

namespace App\Filament\Resources\BannermarketResource\Pages;

use App\Filament\Resources\BannermarketResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBannermarket extends EditRecord
{
    protected static string $resource = BannermarketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
