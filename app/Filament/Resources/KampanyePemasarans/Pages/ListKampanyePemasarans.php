<?php

namespace App\Filament\Resources\KampanyePemasarans\Pages;

use App\Filament\Resources\KampanyePemasarans\KampanyePemasaranResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKampanyePemasarans extends ListRecords
{
    protected static string $resource = KampanyePemasaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
              ->label('Buat Kampanye'),
        ];
    }
}
