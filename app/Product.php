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
        $product->image_name = 'first_photo.png';
        $product->price_uah = 500;
        $product->price_usd = 40;
        $product->save();

        $product = new Product();
        $product->name = 'Сова';
        $product->image_name = 'second_photo.png';
        $product->price_uah = 800;
        $product->price_usd = 1;
        $product->save();

        $product = new Product();
        $product->name = 'Бегун';
        $product->image_name = 'third_photo.png';
        $product->price_uah = 1120;
        $product->price_usd = 60;
        $product->save();

        $product = new Product();
        $product->name = 'Ласкотун';
        $product->image_name = 'fourth_photo.png';
        $product->price_uah = 1120;
        $product->price_usd = 60;
        $product->save();

        $product = new Product();
        $product->name = 'Тестикс';
        $product->image_name = 'fifth_photo.png';
        $product->price_uah = 1120;
        $product->price_usd = 60;
        $product->save();

        $product = new Product();
        $product->name = 'Тестикс 2';
        $product->image_name = 'sixth_photo.png';
        $product->price_uah = 1120;
        $product->price_usd = 60;
        $product->save();

        $product = new Product();
        $product->name = 'Тестикс 3';
        $product->image_name = 'nezabudka.png';
        $product->price_uah = 1120;
        $product->price_usd = 60;
        $product->save();

        $product = new Product();
        $product->name = 'Тестикс 2';
        $product->image_name = 'seventh_photo.png';
        $product->price_uah = 1120;
        $product->price_usd = 60;
        $product->save();
    }
}
