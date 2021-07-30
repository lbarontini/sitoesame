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

use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/products', 'ProductsController@index')->name('products.index');
Route::post('/products', 'ProductsController@store')->name('products.store');
Route::get('/products/create', 'ProductsController@create')->name('products.create');
Route::get('/products/{product}', 'ProductsController@show')->name('products.show');
Route::put('/products/{product}', 'ProductsController@update')->name('products.update');
Route::delete('/products/{product}', 'ProductsController@destroy')->name('products.destroy');
Route::get('/products/{product}/edit', 'ProductsController@edit')->name('products.edit');


Route::get('faqs', function () {
   return view('faqs');
});
Route::get('assistance_centers', function () {
    return view('assistance_centers');
});
Route::get('login', function () {
    return view('login');
});
