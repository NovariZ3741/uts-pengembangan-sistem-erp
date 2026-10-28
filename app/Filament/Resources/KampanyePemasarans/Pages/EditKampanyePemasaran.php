<?php

namespace App\Filament\Resources\KampanyePemasarans\Pages;

use App\Filament\Resources\KampanyePemasarans\KampanyePemasaranResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKampanyePemasaran extends EditRecord
{
    protected static string $resource = KampanyePemasaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
