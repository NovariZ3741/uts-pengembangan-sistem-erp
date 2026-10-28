<?php

namespace App\Filament\Resources\KampanyePemasarans;

use App\Filament\Resources\KampanyePemasarans\Pages\CreateKampanyePemasaran;
use App\Filament\Resources\KampanyePemasarans\Pages\EditKampanyePemasaran;
use App\Filament\Resources\KampanyePemasarans\Pages\ListKampanyePemasarans;
use App\Models\KampanyePemasaran;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class KampanyePemasaranResource extends Resource
{
    protected static ?string $model = KampanyePemasaran::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMegaphone;

    protected static ?string $navigationLabel = 'Kampanye Pemasaran';
    protected static ?string $modelLabel = 'Kampanye Pemasaran';
    protected static ?string $pluralModelLabel = 'Kampanye Pemasaran';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('nama')->required(),
            Select::make('jenis')
                ->options([
                    'email' => 'Email',
                    'media_sosial' => 'Media Sosial',
                    'event' => 'Event',
                    'promo' => 'Promo',
                ])
                ->required(),
            Select::make('status')
                ->options([
                    'draft' => 'Draft',
                    'aktif' => 'Aktif',
                    'selesai' => 'Selesai',
                    'batal' => 'Batal',
                ])
                ->default('draft')
                ->required(),
            DatePicker::make('tanggal_mulai')->required(),
            DatePicker::make('tanggal_selesai')->required()->afterOrEqual('tanggal_mulai'),
            TextInput::make('anggaran')->numeric()->prefix('Rp')->default(0),
            TextInput::make('target_prospek')->numeric()->default(0),
            TextInput::make('prospek_terkumpul')->numeric()->default(0),
            Textarea::make('deskripsi')->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable()->sortable(),
                TextColumn::make('jenis')->badge(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'aktif' => 'success',
                        'selesai' => 'info',
                        'batal' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('tanggal_mulai')->date('d M Y')->sortable(),
                TextColumn::make('tanggal_selesai')->date('d M Y')->sortable(),
                TextColumn::make('anggaran')->money('IDR')->sortable(),
                TextColumn::make('prospek_terkumpul')->label('Prospek'),
            ])
            ->filters([
                SelectFilter::make('status')->options([
                    'draft' => 'Draft',
                    'aktif' => 'Aktif',
                    'selesai' => 'Selesai',
                    'batal' => 'Batal',
                ]),
            ])
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKampanyePemasarans::route('/'),
            'create' => CreateKampanyePemasaran::route('/create'),
            'edit' => EditKampanyePemasaran::route('/{record}/edit'),
        ];
    }
}