<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Type extends Model
{
    public static function insert_default() {
        $type = new Type();
        $type->type = 'Новинки';
        $type->image_name = 'new.png';
        $type->save();

        $type = new Type();
        $type->type = 'Слонята';
        $type->image_name = 'elephants.png';
        $type->save();

        $type = new Type();
        $type->type = 'Все';
        $type->image_name = 'all.png';
        $type->save();
    }

    public function product() {
        return $this->belongsToMany(Product::class);
    }
}
