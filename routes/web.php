<?php

use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();


//HOME
Route::get('/', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/user/edit', 'ProfileController@edit');
// Route::get('/user/{user}', 'ProfileController@index');
// Route::post('/user/edit', 'ProfileController@update');

//SEARCH



//USER
Route::get('/user','UserController@index')->name('user');
Route::get('/user/create','UserController@create')->name('user.create');
Route::get('/user/edit','UserController@edit')->name('user.edit');
Route::post('/user/store', 'UserController@store')->name('cat.store');

//GALLERY
Route::get('/gallery/{img}','UserController@showimg')->name('user.gallery');
Route::get('/gallery/download/{img}','UserController@download')->name('user.download');
Route::resource('/gallery','UserController')->except('destroy');


//CAT
Route::get('/cats','CatController@index')->name('cats');
Route::get('/cat/create', 'CatController@create')->name('cat.create');//show form
Route::get('/cat/edit','CatController@edit')->name('cat.edit');
Route::delete('/cat/delete','CatController@delete')->name('cat.delete');
Route::post ('/cat/store', 'CatController@store')->name('cat.store');

//SERVICE















Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


