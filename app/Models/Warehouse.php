<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    //
     protected $guarded = [];
     public function movements() {
        return $this->hasmany(StockMovement::class);
    }
}
