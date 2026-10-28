<?php

namespace App\Filament\Resources\ProspekPelanggans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProspekPelanggansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable()->sortable(),
                TextColumn::make('perusahaan')->searchable(),
                TextColumn::make('email'),
                TextColumn::make('telepon'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'dihubungi' => 'info',
                        'berminat' => 'warning',
                        'deal' => 'success',
                        'batal' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('kampanyePemasaran.nama')->label('Kampanye'),
            ])
            ->filters([
                SelectFilter::make('status')->options([
                    'baru' => 'Baru',
                    'dihubungi' => 'Dihubungi',
                    'berminat' => 'Berminat',
                    'deal' => 'Deal',
                    'batal' => 'Batal',
                ]),
            ])
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }
}