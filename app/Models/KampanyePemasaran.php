<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KampanyePemasaran extends Model
{

    protected $fillable = [
        'nama',
        'jenis',
        'status',
        'tanggal_mulai',
        'tanggal_selesai',
        'anggaran',
        'target_prospek',
        'prospek_terkumpul',
        'deskripsi',
    ];
}
