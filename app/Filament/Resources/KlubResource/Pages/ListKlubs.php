<?php

namespace App\Filament\Resources\KlubResource\Pages;

use App\Filament\Resources\KlubResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKlubs extends ListRecords
{
    protected static string $resource = KlubResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
