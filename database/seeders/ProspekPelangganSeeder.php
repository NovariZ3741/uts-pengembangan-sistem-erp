<?php

namespace Database\Seeders;

use App\Models\KampanyePemasaran;
use App\Models\ProspekPelanggan;
use Illuminate\Database\Seeder;

class ProspekPelangganSeeder extends Seeder
{
    public function run(): void
    {
        $kampanye = KampanyePemasaran::pluck('id');

        $data = [
            ['Budi Santoso', 'PT Maju Jaya', 'budi@majujaya.test', '081234567801', 'baru'],
            ['Siti Rahma', 'Toko Sumber Rejeki', 'siti@sumberrejeki.test', '081234567802', 'dihubungi'],
            ['Andi Pratama', 'CV Berkah Abadi', 'andi@berkahabadi.test', '081234567803', 'berminat'],
            ['Dewi Lestari', 'Minimarket Sejahtera', 'dewi@sejahtera.test', '081234567804', 'deal'],
            ['Rudi Hartono', 'UD Makmur', 'rudi@makmur.test', '081234567805', 'batal'],
        ];

        foreach ($data as [$nama, $perusahaan, $email, $telepon, $status]) {
            ProspekPelanggan::updateOrCreate(
                ['email' => $email],
                [
                    'nama' => $nama,
                    'perusahaan' => $perusahaan,
                    'telepon' => $telepon,
                    'status' => $status,
                    'kampanye_pemasaran_id' => $kampanye->isNotEmpty() ? $kampanye->random() : null,
                ]
            );
        }
    }
}