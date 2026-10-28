<?php

namespace App\Filament\Resources\KampanyePemasarans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class KampanyePemasaranForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('jenis')
                    ->required(),
                TextInput::make('status')
                    ->required()
                    ->default('draft'),
                DatePicker::make('tanggal_mulai')
                    ->required(),
                DatePicker::make('tanggal_selesai')
                    ->required(),
                TextInput::make('anggaran')
                    ->required()
                    ->numeric()
                    ->default(0),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
            ]);
    }
}
