<?php

namespace App\Filament\Resources\BannermarketResource\Pages;

use App\Filament\Resources\BannermarketResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBannermarkets extends ListRecords
{
    protected static string $resource = BannermarketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
