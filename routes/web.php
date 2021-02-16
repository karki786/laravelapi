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

Route::get('/', function () {
    return view('welcome');
});
// dashboard
// Route::get('/dashboard',function(){
//     return view('admin.dashboard');
// });
Route::get('/dashboard','DashboardController@index');
//
Route::get('/banner','BannerController@index');
Route::post('/banner/store','BannerController@store');



// backend

// Route::get('/banner',function(){
//     return view('backend.banner.index');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('home');

// product
Route::get('/main',function(){
    return view('main');
});
Route::get('/product','ProductController@index')->name('product.index');
Route::get('/create','ProductController@create')->name('product.create');

Route::post('/store','ProductController@store')->name('product.store');

Route::get('edit/product/{id}','Productcontroller@edit');
Route::post('update/product/{id}','Productcontroller@update');
Route::get('delete/product/{id}','Productcontroller@destroy');
Route::get('show/product/{id}','Productcontroller@show');

