<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class ProductForm
{
    public static function configure(Schema $schema): Schema
{
     return $schema->components([
            TextInput::make('sku')
                ->label('SKU')
                ->required()
                ->unique(ignoreRecord: true),
            TextInput::make('name')
                ->label('Nama Produk')
                ->required(),
            TextInput::make('category')
                ->label('Kategori'),
            TextInput::make('price')
                ->label('Harga')
                ->numeric()
                ->prefix('Rp')
                ->required(),
            TextInput::make('min_stock')
                ->label('Stok Minimum')
                ->numeric()
                ->required()
                ->default(0),
        ]);
}
}
