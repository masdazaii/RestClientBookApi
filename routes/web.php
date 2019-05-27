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

Route::get('/admin','adminController@index')->name('admin');

Route::get('/buku',	'BookController@main')->name('buku');

Route::get('login','AuthController@failLogin')->name('login'); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('createuser','adminController@regis')->name('regis');
Route::post('/updateuser','adminController@update')->name('update');
Route::delete('/deleteuser','adminController@delete')->name('delete');


Route::post('addbook','BookController@add')->name('addbook');
Route::post('/updatebook','BookController@update')->name('updatenook');
Route::delete('/deletebook','BookController@delete')->name('deletebook');
