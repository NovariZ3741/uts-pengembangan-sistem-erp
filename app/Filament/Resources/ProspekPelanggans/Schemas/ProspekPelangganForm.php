<?php

namespace App\Filament\Resources\ProspekPelanggans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProspekPelangganForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('nama')->required(),
            TextInput::make('perusahaan'),
            TextInput::make('email')->email(),
            TextInput::make('telepon')->tel(),
            Select::make('status')
                ->options([
                    'baru' => 'Baru',
                    'dihubungi' => 'Dihubungi',
                    'berminat' => 'Berminat',
                    'deal' => 'Deal',
                    'batal' => 'Batal',
                ])
                ->default('baru')
                ->required(),
            Select::make('kampanye_pemasaran_id')
                ->label('Kampanye Pemasaran')
                ->relationship('kampanyePemasaran', 'nama')
                ->searchable()
                ->preload(),
            Textarea::make('catatan')->columnSpanFull(),
        ]);
    }
}
