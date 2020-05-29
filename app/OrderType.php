<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
    public static function insert_default() {
        $product = new OrderType();
        $product->name = 'Почта+доставка';
        $product->image_name = 'new.png';
        $product->save();

        $product = new OrderType();
        $product->name = 'Почта';
        $product->image_name = 'mail.png';
        $product->save();

        $product = new OrderType();
        $product->name = 'Лично';
        $product->image_name = 'person.png';
        $product->save();
    }
}
