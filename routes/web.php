<?php

use App\Product;
use App\ProductType;
use App\Subscribtion;
use App\Type;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $bag = empty(request()->session()->get('products')) ? [] : request()->session()->get('products');
    $bag_capacity = 0;
    foreach ($bag as $item) {
        $bag_capacity += $item;
    }
    return view('index', compact('bag_capacity'));
})->name('index');

Route::get('/testing', function () {
    $bag = empty(request()->session()->get('products')) ? [] : request()->session()->get('products');
    $bag_capacity = 0;
    foreach ($bag as $item) {
        $bag_capacity += $item;
    }
    ProductType::test_delete_entries();
    ProductType::test_add_entries();
    return view('index', compact('bag_capacity'));
});

Route::get('/constructor', function () {
    $bag = empty(request()->session()->get('products')) ? [] : request()->session()->get('products');
    $bag_capacity = 0;
    foreach ($bag as $item) {
        $bag_capacity += $item;
    }
    return view('constructor', compact('bag_capacity'));
})->name('constructor');

// Buy contatiners
Route::get('/store', function () {
    return Redirect::to('/store/type/1');
})->name('store');

Route::get('/store/type', function ($id=1) {
    return Redirect::to('/store/type/'.$id);
})->name('store');

Route::post('/store/type/', function () {
    $id =  request('type_id', '');
    return Redirect::to('/store/type/'.$id);
})->name('store_type_choice');

Route::get('/store/type/{id}', function ($id=1) {
    $bag = empty(request()->session()->get('products')) ? [] : request()->session()->get('products');
    $bag_capacity = 0;
    foreach ($bag as $item) {
        $bag_capacity += $item;
    }
    $all_types = Type::all();
    $type = Type::all()->where('id', $id)->first();
    $all_products = $type->product->all();
    return view('buy_container', compact('all_products', 'all_types', 'type', 'bag_capacity', 'bag'));
});

Route::post('/store/type/{id}/add', function () {
    if(request()->session()->get('products') == []) {
        session()->put('products', [request("product_id") => 1]);
    } elseif(!array_key_exists(request('product_id'), request()->session()->get('products'))) {
        session()->put('products.'.request('product_id'), 1);
    } else {
        $quantity = session()->get('products.'.request('product_id')) + 1;
        session()->put('products.'.request('product_id'), $quantity);
    }
    return back();
})->name('bag_product');

Route::post('/store/type/{id}/delete', function () {
    if(array_key_exists(request('product_id'), request()->session()->get('products'))) {
        $deleting = session()->get('products');
        unset($deleting[request('product_id')]);
        session()->forget('products');
        session()->put('products', $deleting);
    }
    return back();
})->name('bag_delete');
//---

Route::get('/info', function () {
    $bag = empty(request()->session()->get('products')) ? [] : request()->session()->get('products');
    $bag_capacity = 0;
    foreach ($bag as $item) {
        $bag_capacity += $item;
    }
    return view('info', compact('bag_capacity'));
})->name('info');

Route::post('/info', function () {
    $bag = empty(request()->session()->get('products')) ? [] : request()->session()->get('products');
    $bag_capacity = 0;
    foreach ($bag as $item) {
        $bag_capacity += $item;
    }
    $email = request('mail');
    $checker = Subscribtion::check_add_subscription($email);
    return view('info', compact('checker', 'bag_capacity'));
})->name('info_sub');

Route::get('/bag', function () {
    $bag = empty(request()->session()->get('products')) ? [] : request()->session()->get('products');
    $bag_capacity = 0;
    $all_products = Product::all();
    $sum = 0;
    for($i = 0; $i < sizeof($all_products); $i++) {
        if(array_key_exists($all_products[$i]->id, $bag)) {
            $sum += $all_products[$i]->price_uah * $bag[$all_products[$i]->id];
        }
    }
    foreach ($bag as $item) {
        $bag_capacity += $item;
    }
    return view('bag', compact('bag', 'bag_capacity', 'all_products', 'sum'));
})->name('bag');

Route::post('/bag/add', function () {
    $quantity = session()->get('products.'.request('product_id')) + 1;
    session()->put('products.'.request('product_id'), $quantity);
    return back();
})->name('order_product');

Route::post('/bag/delete', function () {
    if(array_key_exists(request('product_id'), request()->session()->get('products'))) {
        $deleting = session()->get('products');
        unset($deleting[request('product_id')]);
        session()->forget('products');
        session()->put('products', $deleting);
    }
    return back();
})->name('order_delete');

Route::get('/bag/order', function () {
    return Redirect::to('/bag/order/type/1');
});

Route::get('/bag/order/type/', function ($id=1) {
    return Redirect::to('/bag/order/type/'.$id);
});

Route::post('/bag/order/type/', function () {
    $id =  request('type_id', '1');
    return Redirect::to('/bag/order/type/'.$id);
})->name('bag_order');

Route::get('/bag/order/type/{id?}', function ($id=1) {
    $bag = empty(request()->session()->get('products')) ? [] : request()->session()->get('products');
    $bag_capacity = 0;
    foreach ($bag as $item) {
        $bag_capacity += $item;
    }
    $all_products = Product::all();
    $sum = 0;
    for($i = 0; $i < sizeof($all_products); $i++) {
        if(array_key_exists($all_products[$i]->id, $bag)) {
            $sum += $all_products[$i]->price_uah * $bag[$all_products[$i]->id];
        }
    }
    $all_order_types = \App\OrderType::all();
    $cur = \App\OrderType::all()->where('id', $id)->first();
    return view('order', compact('bag_capacity', 'sum', 'all_order_types', 'cur'));
})->name('order');

Route::post('/bag/order/type/{id?}/complete', function () {
    session()->put('credentials',
        ['fname' => request('fname'),
        'lname' => request('lname'),
        'country' => request('country'),
        'region' => request('region'),
        'city' => request('city'),
        'street' => request('street'),
        'home' => request('home'),
        'index' => request('index'),
        'email' => request('email'),
        'mobile_phone' => request('mobile_phone'),
        'bag' => session()->get('products'),
        'sum' => request('sum')]);
    session()->forget('products');
    session()->flash('success', session()->get('credentials.fname').' Ваш заказ был успешно обработан!');
    return \redirect()->route('index');
})->name('order_complete');
