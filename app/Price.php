<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public function currency() {
        return $this->belongsTo(Currency::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
