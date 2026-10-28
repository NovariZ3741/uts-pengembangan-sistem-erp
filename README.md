# ERP PT Neosantara Group

Platform Enterprise Resource Planning (ERP) terpadu untuk **PT Neosantara Group**, perusahaan distributor dan retail nasional. Aplikasi ini mengintegrasikan proses bisnis mulai dari **pencarian prospek pelanggan**, **kampanye pemasaran**, hingga **pengelolaan stok barang di gudang**.

Proyek ini dibuat sebagai tugas Ujian Tengah Semester (UTS) mata kuliah Pengembangan Sistem ERP.

## Tech Stack

| Komponen | Versi |
|---|---|
| PHP | 8.3 |
| Laravel | 13 |
| Filament (Panel Builder) | 5.x |
| Livewire | 4.x |
| Database | SQLite |

## Fitur

### 1. Pengelolaan Stok Barang
- **Produk**: SKU, nama, kategori, harga (Rupiah), dan stok minimum. Total stok dihitung otomatis dari riwayat pergerakan, dengan badge merah jika stok kurang dari atau sama dengan batas minimum.
- **Gudang**: data gudang beserta lokasinya.
- **Pergerakan Stok**: pencatatan **barang masuk** dan **barang keluar** per gudang. Barang keluar ditolak jika stok di gudang tidak mencukupi. Riwayat tidak dapat diedit agar jejak audit tetap utuh.
- **Widget Stok Menipis** di dashboard untuk produk yang stoknya sudah di bawah atau sama dengan batas minimum.

### 2. Kampanye Pemasaran
- Pengelolaan kampanye: nama, jenis (email, media sosial, event, promo), status (draft, aktif, selesai, batal), periode, anggaran, dan target prospek.
- Kampanye dapat dikaitkan dengan **produk yang dipromosikan**.

### 3. Prospek Pelanggan
- Pencatatan calon pelanggan (nama, perusahaan, kontak, status, catatan).
- Setiap prospek dapat dikaitkan dengan **kampanye** asalnya.
- Widget ringkasan pemasaran di dashboard.

### Keterkaitan Antar Modul

```
Kampanye Pemasaran ──< Prospek Pelanggan
        │
        └──< Produk ──< Pergerakan Stok >── Gudang
```

Kampanye mempromosikan produk, prospek berasal dari kampanye, dan stok produk dipantau lewat pergerakan stok di gudang.

## Instalasi

### Prasyarat
- PHP 8.3 dengan ekstensi `sqlite3`, `mbstring`, `openssl`, `fileinfo`
- Composer
- Node.js dan npm (hanya jika ingin build aset)
- Git

### Langkah

```bash
# 1. Clone repository
git clone https://github.com/NovariZ3741/uts-pengembangan-sistem-erp.git
cd uts-pengembangan-sistem-erp

# 2. Install dependensi
composer install

# 3. Siapkan environment
cp .env.example .env
php artisan key:generate

# 4. Siapkan database SQLite
touch database/database.sqlite
# Windows PowerShell: New-Item database/database.sqlite -ItemType File

# 5. Jalankan migration dan seeder
php artisan migrate --seed

# 6. Jalankan aplikasi
php artisan serve
```

Pastikan `.env` memakai konfigurasi berikut:

```env
DB_CONNECTION=sqlite
```

Aplikasi dapat dibuka di **http://127.0.0.1:8000/admin**.

## Akun Login

| Email | Password |
|---|---|
| `admin@example.test` | `password` |

Jika akun belum ada, buat dengan:

```bash
php artisan make:filament-user
```

## Struktur Modul

```
app/
├── Filament/
│   ├── Resources/
│   │   ├── Products/              # Produk
│   │   ├── Warehouses/            # Gudang
│   │   ├── StockMovements/        # Barang masuk / keluar
│   │   ├── KampanyePemasarans/    # Kampanye pemasaran
│   │   └── ProspekPelanggans/     # Prospek pelanggan
│   └── Widgets/
│       ├── LowStock.php           # Stok menipis
│       └── RingkasanPemasaran.php # Ringkasan pemasaran
└── Models/
database/
├── migrations/
└── seeders/
```

## Pembagian Tim

| Anggota | Branch | Modul |
|---|---|---|
| NovariZ | `stok-barang` | Produk, Gudang, Pergerakan Stok, widget Stok Menipis |
| Luthfi | `kampanye-pemasaran`, `prospek-pelanggan` | Kampanye Pemasaran, Prospek Pelanggan |

## Alur Demo

1. Buat **kampanye** dan pilih prospek.
2. Catat **prospek** yang berasal dari kampanye tersebut.
3. Ubah status prospek sesuai perkembangan.
4. Catat **barang masuk** untuk produk di gudang, lalu cek total stok di halaman Produk.
5. Catat **barang keluar** dan amati badge stok serta widget **Stok Menipis** di dashboard.

## Catatan Pengembangan

<img width="1366" height="768" alt="Screenshot (262)" src="https://github.com/user-attachments/assets/fdd917d6-9cce-49f0-8339-18ca54b0c56d" />
<img width="1366" height="768" alt="Screenshot (261)" src="https://github.com/user-attachments/assets/3944753d-e0d0-455f-acba-dc8f21316e44" />
<img width="1366" height="768" alt="Screenshot (260)" src="https://github.com/user-attachments/assets/c66ff2d9-1ecd-450d-a937-39b821b53090" />
<img width="1366" height="768" alt="Screenshot (259)" src="https://github.com/user-attachments/assets/3a8bfb96-5b3b-4765-97ee-6927d56a163d" />
<img width="1366" height="768" alt="Screenshot (258)" src="https://github.com/user-attachments/assets/1367aaab-f4a1-4a07-814b-612ed1a6dfe3" />
<img width="1366" height="768" alt="Screenshot (257)" src="https://github.com/user-attachments/assets/c23fce0b-374e-4f65-9463-fee02f7cbdeb" />
