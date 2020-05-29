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

        $products = Product::all();
        if($products) {
            $product_type = new ProductType;
            $product_type->product_id = $products[0]->id;
            $product_type->type_id = 3;
            $product_type->save();

            $product_type = new ProductType;
            $product_type->product_id = $products[1]->id;
            $product_type->type_id = 3;
            $product_type->save();

            $product_type = new ProductType;
            $product_type->product_id = $products[2]->id;
            $product_type->type_id = 3;
            $product_type->save();

            $product_type = new ProductType;
            $product_type->product_id = $products[3]->id;
            $product_type->type_id = 3;
            $product_type->save();

            $product_type = new ProductType;
            $product_type->product_id = $products[4]->id;
            $product_type->type_id = 3;
            $product_type->save();

            $product_type = new ProductType;
            $product_type->product_id = $products[5]->id;
            $product_type->type_id = 3;
            $product_type->save();

            $product_type = new ProductType;
            $product_type->product_id = $products[6]->id;
            $product_type->type_id = 3;
            $product_type->save();

            $product_type = new ProductType;
            $product_type->product_id = $products[7]->id;
            $product_type->type_id = 3;
            $product_type->save();
            ///
            $product_type = new ProductType;
            $product_type->product_id = $products[0]->id;
            $product_type->type_id = 2;
            $product_type->save();

            $product_type = new ProductType;
            $product_type->product_id = $products[1]->id;
            $product_type->type_id = 1;
            $product_type->save();

            $product_type = new ProductType;
            $product_type->product_id = $products[2]->id;
            $product_type->type_id = 1;
            $product_type->save();

            $product_type = new ProductType;
            $product_type->product_id = $products[3]->id;
            $product_type->type_id = 1;
            $product_type->save();

            $product_type = new ProductType;
            $product_type->product_id = $products[4]->id;
            $product_type->type_id = 2;
            $product_type->save();

            $product_type = new ProductType;
            $product_type->product_id = $products[5]->id;
            $product_type->type_id = 1;
            $product_type->save();

            $product_type = new ProductType;
            $product_type->product_id = $products[6]->id;
            $product_type->type_id = 2;
            $product_type->save();

            $product_type = new ProductType;
            $product_type->product_id = $products[7]->id;
            $product_type->type_id = 2;
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
