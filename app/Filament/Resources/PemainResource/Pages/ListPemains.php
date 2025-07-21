<?php

namespace App\Filament\Resources\PemainResource\Pages;

use App\Filament\Resources\PemainResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPemains extends ListRecords
{
    protected static string $resource = PemainResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
