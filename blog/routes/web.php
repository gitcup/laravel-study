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
//สินค้า
Route::get('/typeproduct','TypeProductController@index')->name('typeproduct');
//ลบข้อมูลสินค้า
Route::get('/typeproduct/destroy/{id}', 'TypeProductController@destroy');

Route::get('/typebooks','TypeBooksController@index')->name('typebooks');
//ลบข้อมูล
Route::get('/typebooks/destroy/{id}', 'TypeBooksController@destroy');

//แนะนำตัว
Route::get('about','SiteController@index');
Route::get('/about','SiteController@index')->name('about'); 

Route::get('/', function () {
    return view('auth/login'); //หน้าแรก
});


 
Auth::routes();
//ตั้งชื่อ เมธอด index ว่า book
Route::resource('/books', 'BooksController')->name('index','books');;
Route::resource('/product', 'ProductController')->name('index','product');;

Route::get('/home', 'HomeController@index')->name('home');
