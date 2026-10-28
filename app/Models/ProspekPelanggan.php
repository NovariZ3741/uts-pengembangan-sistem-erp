<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProspekPelanggan extends Model
{
    protected $guarded = [];

    public function kampanyePemasaran(): BelongsTo
    {
        return $this->belongsTo(KampanyePemasaran::class);
    }
}