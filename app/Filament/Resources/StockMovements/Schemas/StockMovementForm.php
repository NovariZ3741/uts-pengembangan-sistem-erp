<?php

namespace App\Filament\Resources\StockMovements\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StockMovementForm
{
    public static function form(Schema $schema): Schema
    {
        return $schema->components([
        Select::make('type')->label('Jenis')
            ->options(['in' => 'Barang Masuk', 'out' => 'Barang Keluar'])->required(),
        Select::make('product_id')->label('Produk')
            ->relationship('product', 'name')->searchable()->preload()->required(),
        Select::make('warehouse_id')->label('Gudang')
            ->relationship('warehouse', 'name')->required(),
        TextInput::make('quantity')->label('Jumlah')->numeric()->minValue(1)->required(),
        TextInput::make('note')->label('Catatan'),
    ]);
    }
}
