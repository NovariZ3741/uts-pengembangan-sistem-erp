<?php

namespace App\Filament\Resources\ProspekPelanggans;

use App\Filament\Resources\ProspekPelanggans\Pages\CreateProspekPelanggan;
use App\Filament\Resources\ProspekPelanggans\Pages\EditProspekPelanggan;
use App\Filament\Resources\ProspekPelanggans\Pages\ListProspekPelanggans;
use App\Filament\Resources\ProspekPelanggans\Schemas\ProspekPelangganForm;
use App\Filament\Resources\ProspekPelanggans\Tables\ProspekPelanggansTable;
use App\Models\ProspekPelanggan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProspekPelangganResource extends Resource
{
    protected static ?string $model = ProspekPelanggan::class;

    protected static ?string $navigationLabel = 'Prospek Pelanggan';

    protected static ?string $modelLabel = 'Prospek Pelanggan';
    
    protected static ?string $pluralModelLabel = 'Prospek Pelanggan';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ProspekPelangganForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProspekPelanggansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProspekPelanggans::route('/'),
            'create' => CreateProspekPelanggan::route('/create'),
            'edit' => EditProspekPelanggan::route('/{record}/edit'),
        ];
    }
}
