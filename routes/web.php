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

Route::get('/malfunctions', 'MalfunctionsController@index')->name('malfunctions.index');
Route::post('/malfunctions', 'MalfunctionsController@store')->name('malfunctions.store');
Route::get('/malfunctions/create', 'MalfunctionsController@create')->name('malfunctions.create');
Route::put('/malfunctions/{malfunction}', 'MalfunctionsController@update')->name('malfunctions.update');
Route::delete('/malfunctions/{malfunction}', 'MalfunctionsController@destroy')->name('malfunctions.destroy');
Route::get('/malfunctions/{malfunction}/edit', 'MalfunctionsController@edit')->name('malfunctions.edit');

Route::get('/solutions', 'SolutionsController@index')->name('solutions.index');
Route::post('/solutions', 'SolutionsController@store')->name('solutions.store');
Route::get('/solutions/create', 'SolutionsController@create')->name('solutions.create');
Route::put('/solutions/{solution}', 'SolutionsController@update')->name('solutions.update');
Route::delete('/solutions/{solution}', 'SolutionsController@destroy')->name('solutions.destroy');
Route::get('/solutions/{solution}/edit', 'SolutionsController@edit')->name('solutions.edit');

Route::get('/users', 'UsersController@index')->name('users.index');
Route::put('/users/{user}', 'UsersController@update')->name('users.update');
Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');

Route::get('/assistance_centers', 'AssistanceCentersController@index')->name('assistance_centers.index');
Route::post('/assistance_centers', 'AssistanceCentersController@store')->name('assistance_centers.store');
Route::get('/assistance_centers/create', 'AssistanceCentersController@create')->name('assistance_centers.create');
Route::get('/assistance_centers/{assistance_center}', 'AssistanceCentersController@show')->name('assistance_centers.show');
Route::put('/assistance_centers/{assistance_center}', 'AssistanceCentersController@update')->name('assistance_centers.update');
Route::delete('/assistance_centers/{assistance_center}', 'AssistanceCentersController@destroy')->name('assistance_centers.destroy');
Route::get('/assistance_centers/{assistance_center}/edit', 'AssistanceCentersController@edit')->name('assistance_centers.edit');

Route::get('/administration', 'HomeController@administration')->name('administration');


Route::get('faqs', function () {
   return view('faqs');
});

Auth::routes();

Route::get('/login_home', 'HomeController@index')->name('login_home');
