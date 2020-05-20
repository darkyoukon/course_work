<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table='product_type';

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public static function test_add_entries() {
        $product = new Product();
        $product->name = 'Test';
        $product->price_uah = 123;
        $product->price_usd = 60;
        $product->image= Product::all()->where('id', 1)->first()->image;
        $product->save();

        $products = Product::all();
        if($products) {
            $product_type = new ProductType;
            $product_type->product_id = $products[1]->id;
            $product_type->type_id = 3;
            $product_type->save();

            $product_type = new ProductType;
            $product_type->product_id = $products[0]->id;
            $product_type->type_id = 2;
            $product_type->save();

            $product_type = new ProductType;
            $product_type->product_id = $products[0]->id;
            $product_type->type_id = 3;
            $product_type->save();

            $product_type = new ProductType;
            $product_type->product_id = $products[2]->id;
            $product_type->type_id = 1;
            $product_type->save();

            $product_type = new ProductType;
            $product_type->product_id = $products[2]->id;
            $product_type->type_id = 3;
            $product_type->save();
        }
    }

    public static function test_delete_entries() {
        $product_type = ProductType::all();
        if($product_type) {
            foreach ($product_type as $p_t) {
                $p_t->delete();
            }
        }
    }
}
