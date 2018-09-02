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

//เชื่อมต่อฐานข้อมูล เช็คด้วย http://localhost/blog/public/check-connect
Route::get('check-connect',function(){
 if(DB::connection()->getDatabaseName())
 {
 return "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
 }else{
 return 'Connection False !!';
 }
 
});

//ตั้งค่าเวลา ให้แสดงตามโซนไทย
date_default_timezone_set('Asia/Bangkok');
//สินค้า
Route::get('/typeproduct','TypeProductController@index')->name('typeproduct');
//ลบข้อมูลสินค้า
Route::get('/typeproduct/destroy/{id}', 'TypeProductController@destroy');


//หนังสือ
Route::get('/typebooks','TypeBooksController@index')->name('typebooks');
//ลบข้อมูล
Route::get('/typebooks/destroy/{id}', 'TypeBooksController@destroy');

//ผู้ดูแลระบบ
Route::get('/admin','AdminController@index')->name('admin');
//ลบข้อมูล
Route::get('/admin/destroy/{id}', 'AdminController@destroy');


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
Route::resource('/typeproduct', 'TypeProductController')->name('index','typeproduct');;
Route::resource('/admin', 'AdminController')->name('index','admin');; // หน้าเพิ่มข้อมูล

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');
