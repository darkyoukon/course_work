<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{
    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function price() {
        return $this->belongsTo(Price::class);
    }
}
