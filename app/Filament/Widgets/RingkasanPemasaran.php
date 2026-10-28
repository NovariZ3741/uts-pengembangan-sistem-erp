<?php

namespace App\Filament\Widgets;

use App\Models\KampanyePemasaran;
use App\Models\ProspekPelanggan;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class RingkasanPemasaran extends StatsOverviewWidget
{
    protected ?string $heading = 'Ringkasan Pemasaran';

    protected function getStats(): array
    {
        return [
            Stat::make('Total Prospek Pelanggan', ProspekPelanggan::count())
                ->description('Seluruh prospek terdaftar')
                ->icon('heroicon-o-users')
                ->color('primary'),

            Stat::make('Kampanye Aktif', KampanyePemasaran::where('status', 'aktif')->count())
                ->description('Sedang berjalan saat ini')
                ->icon('heroicon-o-megaphone')
                ->color('success'),

            Stat::make('Prospek Deal', ProspekPelanggan::where('status', 'deal')->count())
                ->description('Berhasil menjadi pelanggan')
                ->icon('heroicon-o-check-badge')
                ->color('warning'),
        ];
    }
}