<?php

namespace App\Filament\Resources\ProspekPelanggans\Pages;

use App\Filament\Resources\ProspekPelanggans\ProspekPelangganResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProspekPelanggans extends ListRecords
{
    protected static string $resource = ProspekPelangganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->label('Tambah Prospek'),
        ];
    }
}
