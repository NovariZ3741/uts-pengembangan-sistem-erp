<?php

namespace App\Filament\Resources\StockMovements\Pages;

use App\Filament\Resources\StockMovements\StockMovementResource;
use App\Models\StockMovement;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateStockMovement extends CreateRecord
{
    protected static string $resource = StockMovementResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
{
    if ($data['type'] === 'out') {
        $available = StockMovement::where('product_id', $data['product_id'])
            ->where('warehouse_id', $data['warehouse_id'])->sum('quantity');

        if ($available < $data['quantity']) {
            Notification::make()->title("Stok tidak cukup (tersedia: $available)")->danger()->send();
            $this->halt();
        }
        $data['quantity'] = -$data['quantity'];
    }

    return $data;
}
}
