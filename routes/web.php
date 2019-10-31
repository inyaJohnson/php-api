<?php

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
use App\Model\Product;

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', function () {
    $products = Product::find(4)->reviews;
    // dd($products);
    return view('output', ['data' => $products]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
