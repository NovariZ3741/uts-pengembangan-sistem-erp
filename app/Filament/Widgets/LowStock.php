<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LowStock extends TableWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->heading('Stok menipis')
            ->query(Product::query()
                ->withSum('movements', 'quantity')
                ->havingRaw('coalesce(movement_sum_quantity, 0)<= min_stock'))
            ->columns([
                TextColumn::make('name')->label('Produk'),
                TextColumn::make('movements_sum_quantity')->label('Stok')->default(0)->badge()->color('danger'),
                TextColumn::make('min_stock')->label('Minimum'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
