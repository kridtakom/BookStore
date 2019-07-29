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

Route::get('/book', 'BookController@index')-> name ('book.show');
Route::get('/book/new', 'BookController@addForm') -> name('book.form.add');
Route::post('/book/new', 'BookController@addBook') -> name('book.add');  //สร้างชื่อเล่นง่ายกว่า

