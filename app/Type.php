<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Type extends Model
{
    public static function insert_default() {
        $type = new Type();
        $type->type = 'Новинки';
        $type->image = Image::make('public/img/types/new.png')->encode('png');
        $type->save();

        $type = new Type();
        $type->type = 'Слонята';
        $type->image = Image::make('public/img/types/elephants.png')->encode('png');
        $type->save();

        $type = new Type();
        $type->type = 'Все';
        $type->image = Image::make('public/img/types/all.png')->encode('png');
        $type->save();
    }

    public function product() {
        return $this->belongsToMany(Product::class);
    }
}
