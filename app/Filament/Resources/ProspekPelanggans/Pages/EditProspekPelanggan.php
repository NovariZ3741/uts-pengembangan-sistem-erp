<?php

namespace App\Filament\Resources\ProspekPelanggans\Pages;

use App\Filament\Resources\ProspekPelanggans\ProspekPelangganResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProspekPelanggan extends EditRecord
{
    protected static string $resource = ProspekPelangganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
