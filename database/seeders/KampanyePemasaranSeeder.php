<?php

namespace Database\Seeders;

use App\Models\KampanyePemasaran;
use Illuminate\Database\Seeder;

class KampanyePemasaranSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['Promo Akhir Tahun 2026', 'promo', 'aktif', '2026-12-01', '2026-12-31', 25000000, 200, 85],
            ['Newsletter Produk Baru', 'email', 'aktif', '2026-11-01', '2026-11-30', 5000000, 500, 320],
            ['Kampanye Instagram Ramadhan', 'media_sosial', 'draft', '2027-03-01', '2027-03-30', 15000000, 300, 0],
            ['Pameran Distributor Nasional', 'event', 'selesai', '2026-09-10', '2026-09-12', 40000000, 150, 172],
            ['Diskon Harbolnas 11.11', 'promo', 'aktif', '2026-11-05', '2026-11-12', 30000000, 400, 210],
            ['Email Blast Pelanggan Retail', 'email', 'selesai', '2026-08-01', '2026-08-15', 3500000, 600, 540],
            ['Iklan TikTok Produk Baru', 'media_sosial', 'aktif', '2026-10-15', '2026-11-15', 12000000, 350, 140],
            ['Gathering Mitra Distributor', 'event', 'batal', '2026-10-20', '2026-10-21', 20000000, 100, 0],
        ];

        foreach ($data as [$nama, $jenis, $status, $mulai, $selesai, $anggaran, $target, $terkumpul]) {
            KampanyePemasaran::updateOrCreate(
                ['nama' => $nama],
                [
                    'jenis' => $jenis,
                    'status' => $status,
                    'tanggal_mulai' => $mulai,
                    'tanggal_selesai' => $selesai,
                    'anggaran' => $anggaran,
                    'target_prospek' => $target,
                    'prospek_terkumpul' => $terkumpul,
                    'deskripsi' => "Data contoh {$nama}",
                ]
            );
        }
    }
}