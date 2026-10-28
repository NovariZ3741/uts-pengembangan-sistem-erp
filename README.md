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

 <img width="1366" height="768" alt="Screenshot (256)" src="https://github.com/user-attachments/assets/92c4d75c-2f50-4fc6-9ab9-f677129a772d" />
<img width="1366" height="768" alt="Screenshot (255)" src="https://github.com/user-attachments/assets/d39f8e18-a05d-4888-a037-282890cb89b4" />
<img width="1366" height="768" alt="Screenshot (254)" src="https://github.com/user-attachments/assets/f2593eca-3d4a-4814-83a8-203fa6936af5" />
<img width="1366" height="768" alt="Screenshot (253)" src="https://github.com/user-attachments/assets/264ede2d-e5ba-4b4a-9485-d2e1a2feeaee" />
<img width="1366" height="768" alt="Screenshot (252)" src="https://github.com/user-attachments/assets/cc80e62c-9116-46d9-b7d8-5a40f1f2189e" />
<img width="1366" height="768" alt="Screenshot (251)" src="https://github.com/user-attachments/assets/134721a0-327e-4886-8d0d-4e51fc83ba73" />
