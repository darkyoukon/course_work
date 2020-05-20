<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Product extends Model
{
    public function type() {
        return $this->belongsToMany(Type::class);
    }

    public function currency() {
        return $this->belongsToMany(Currency::class);
    }

    public function bag() {
        return $this->hasMany(Bag::class);
    }

    public static function deleteNew() {
        foreach(Type::all()->where('type', 'new')->product::all() as $item) {
            if(Carbon::parse($item->created_at)->diffInDays(Carbon::now()) > 30) {
                $item->delete();
            }
        }
    }

    public static function insert_default() {
        $product = new Product();
        $product->name = 'Толстун';
        $product->image = Image::make('public/img/toys/first_photo.png')->encode('png');
        $product->price_uah = 500;
        $product->price_usd = 40;
        $product->save();

        $product = new Product();
        $product->name = 'Сова';
        $product->image = Image::make('public/img/toys/second_photo.png')->encode('png');
        $product->price_uah = 8;
        $product->price_usd = 1;
        $product->save();

        $product = new Product();
        $product->name = 'Бегун';
        $product->image = Image::make('public/img/toys/third_photo.png')->encode('png');
        $product->price_uah = 1120;
        $product->price_usd = 60;
        $product->save();
    }
}
