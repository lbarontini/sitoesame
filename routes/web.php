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
})->name('welcome');

Route::get('/products', 'ProductsController@index')->name('products.index');
Route::get('/products/search', 'ProductsController@search')->name('products.search');
Route::post('/products', 'ProductsController@store')->name('products.store');
Route::get('/products/create', 'ProductsController@create')->name('products.create');
Route::get('/products/{product}', 'ProductsController@show')->name('products.show');
Route::put('/products/{product}', 'ProductsController@update')->name('products.update');
Route::delete('/products/{product}', 'ProductsController@destroy')->name('products.destroy');
Route::get('/products/edit/{product}', 'ProductsController@edit')->name('products.edit');

//Route::get('/malfunctions', 'MalfunctionsController@index')->name('malfunctions.index');
Route::post('/malfunctions', 'MalfunctionsController@store')->name('malfunctions.store');
Route::get('/malfunctions/create/{product_id}', 'MalfunctionsController@create')->name('malfunctions.create');
Route::put('/malfunctions/{malfunction_id}', 'MalfunctionsController@update')->name('malfunctions.update');
Route::delete('/malfunctions/{malfunction}', 'MalfunctionsController@destroy')->name('malfunctions.destroy');
Route::get('/malfunctions/edit/{malfunction_id}', 'MalfunctionsController@edit')->name('malfunctions.edit');

//Route::get('/solutions', 'SolutionsController@index')->name('solutions.index');
Route::post('/solutions', 'SolutionsController@store')->name('solutions.store');
Route::get('/solutions/create/{malfunction_id}', 'SolutionsController@create')->name('solutions.create');
Route::put('/solutions/{solution_id}', 'SolutionsController@update')->name('solutions.update');
Route::delete('/solutions/{solution}', 'SolutionsController@destroy')->name('solutions.destroy');
Route::get('/solutions/edit/{solution_id}', 'SolutionsController@edit')->name('solutions.edit');

Route::get('/users', 'UsersController@index')->name('users.index');
Route::post('/users', 'UsersController@store')->name('users.store');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::put('/users/{user}', 'UsersController@update')->name('users.update');
Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
Route::get('/users/edit/{user}', 'UsersController@edit')->name('users.edit');

Route::get('/assistance_centers', 'AssistanceCentersController@index')->name('assistance_centers.index');
Route::post('/assistance_centers', 'AssistanceCentersController@store')->name('assistance_centers.store');
Route::get('/assistance_centers/create', 'AssistanceCentersController@create')->name('assistance_centers.create');
Route::get('/assistance_centers/{assistance_center}', 'AssistanceCentersController@show')->name('assistance_centers.show');
Route::put('/assistance_centers/{assistance_center}', 'AssistanceCentersController@update')->name('assistance_centers.update');
Route::delete('/assistance_centers/{assistance_center}', 'AssistanceCentersController@destroy')->name('assistance_centers.destroy');
Route::get('/assistance_centers/edit/{assistance_center}', 'AssistanceCentersController@edit')->name('assistance_centers.edit');

Route::get('/faqs', 'FaqsController@index')->name('faqs.index');
Route::post('/faqs', 'FaqsController@store')->name('faqs.store');
Route::get('/faqs/create', 'FaqsController@create')->name('faqs.create');
Route::put('/faqs/{faq}', 'FaqsController@update')->name('faqs.update');
Route::delete('/faqs/{faq}', 'FaqsController@destroy')->name('faqs.destroy');
Route::get('/faqs/edit/{faq}', 'FaqsController@edit')->name('faqs.edit');
Route::post('/faqs_categories', 'FaqsController@storeCategory')->name('faqs_categories.store');
Route::get('/faqs_categories/create', 'FaqsController@createCategory')->name('faqs_categories.create');
Route::put('/faqs_categories/{faqs_category}', 'FaqsController@updateCategory')->name('faqs_categories.update');
Route::delete('/faqs_categories/{faqs_category}', 'FaqsController@destroyCategory')->name('faqs_categories.destroy');
Route::get('/faqs_categories/edit/{faqs_category}', 'FaqsController@editCategory')->name('faqs_categories.edit');

Auth::routes();

Route::get('/login_home', 'HomeController@index')->name('login_home');
