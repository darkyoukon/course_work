<?php

use App\Product;
use App\ProductType;
use App\Subscribtion;
use App\Type;
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
    return view('index');
})->name('index');

Route::get('/testing', function () {
    ProductType::test_delete_entries();
    ProductType::test_add_entries();
    return view('index');
})->name('index');

Route::get('/constructor', function () {
    return view('constructor');
})->name('constructor');

Route::get('/store', function () {
    $all_types = Type::all();
    $type = Type::all()->where('id', 1)->first();
    $all_products = $type->product->all();
    return view('buy_container', compact('all_products', 'all_types', 'type'));
})->name('store');

Route::post('/store', function () {
    $all_types = Type::all();
    $type = Type::all()->where('id', request('type_id', 1))->first();
    $all_products = $type->product->all();
    return view('buy_container', compact('all_products','all_types', 'type'));
})->name('store_type_choice');

Route::get('/info', function () {
    return view('info');
})->name('info');

Route::post('/info', function () {
    $email = request('mail');
    $checker = Subscribtion::check_add_subscription($email);
    return view('info', compact('checker'));
})->name('info_sub');

Route::get('/bag', function () {
    return view('bag');
})->name('bag');

Route::post('/bag/order', function () {
    return view('order');
})->name('bag_order');
