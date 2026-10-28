<?php

namespace App\Filament\Resources\StockMovements\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StockMovementsTable
{
   public static function table(Table $table): Table
{
    return $table->defaultSort('created_at', 'desc')->columns([
        TextColumn::make('created_at')->label('Tanggal')->dateTime('d M Y H:i'),
        TextColumn::make('type')->label('Jenis')->badge()
            ->color(fn ($state) => $state === 'in' ? 'success' : 'danger'),
        TextColumn::make('product.name')->label('Produk')->searchable(),
        TextColumn::make('warehouse.name')->label('Gudang'),
        TextColumn::make('quantity')->label('Jumlah'),
    ]);
}
}
