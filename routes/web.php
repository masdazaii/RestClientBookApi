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



Route::get('/','IndexController@index' )->name('home');

Route::get('/collection', function(){
	return view('book');
})->name('collection');

Route::get('/admin', function(){
	return view('admin/dashboard');
})->name('dashboard');

Route::get('/buku',function(){
	return view('/admin/layouts/buku');
})->name('buku');

Route::get('login','AuthController@failLogin')->name('login'); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
