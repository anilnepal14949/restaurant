<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/','FoodController@listFoods');

Route::get('/', 'CustomerController@index');

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('category', 'CategoryController')->middleware('auth');
Route::resource('food','FoodController')->middleware('auth');

Route::get('customer', 'CustomerController@index');
Route::get('customer/{customer}', 'CustomerController@show');
Route::get('customer/{customer}/update', 'CustomerController@update');
Route::get('customer/{customer}/delete', 'CustomerController@destroy');

Route::get('supplier', 'SupplierController@index');
Route::get('supplier/{supplier}', 'SupplierController@show');
Route::get('supplier/{supplier}/update', 'SupplierController@update');
Route::get('supplier/{supplier}/delete', 'SupplierController@destroy');


