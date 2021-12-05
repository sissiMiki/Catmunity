<?php

use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Auth;
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

//1.Methode
    //1. Parameter -> URI
    //2. Aktion

Auth::routes();



Route::get('/', 'HomeController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/edit', 'ProfileController@edit');
Route::get('/user/{user}', 'ProfileController@index');
Route::post('/user/edit', 'ProfileController@update');

Route::get('/user','UserController@index');
Route::get('/user/create','UserController@create')->name('user.create');
Route::get('/user/edit','UserController@edit');



Route::get('/cat/create', 'CatController@create');
Route::get('/cat','CatController@index');
Route::post('/cat','CatController@store');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


