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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('admin/category','Admin\CategoryController');
Route::resource('admin/product','Admin\ProductController');

Route::get('/product/{id}', 'ProductController@show')->name('product.show');
Route::get('/categories', 'CategoryController@list')->name('category.list');
Route::get('/category/{id}', 'ProductController@listByCategory')->name('product.listByCategory');