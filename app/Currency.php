<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Currency extends Model
{
    public function product() {
        return $this->belongsToMany(Product::class);
    }

    public static function insert_default() {
        $currency = new Currency();
        $currency->currency = 'uah';
        $currency->image = Image::make('public/img/currencies/uah.png')->encode('png');
        $currency->save();

        $currency = new Currency();
        $currency->currency = 'usd';
        $currency->image = Image::make('public/img/currencies/usd.png')->encode('png');
        $currency->save();
    }
}
