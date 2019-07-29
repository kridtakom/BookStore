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
//สร้างชื่อเล่นให้ route ทำให่การใช้งานมีประสิทธิภาพที่ดีขึ้นและเรียกง่ายขึ้น
Route::get('/book', 'BookController@index')-> name ('book.show');
Route::get('/book/new', 'BookController@addForm') -> name('book.form.add');
Route::post('/book/new', 'BookController@addBook') -> name('book.add');  
Route::get('/book/update/{id}/{action}', 'BookController@updateBook') -> name('book.update'); 

