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

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('autor', 'AutorController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Para cerrar sesión
Route::get('/logout', 'Auth\LoginController@logout')->name('home');

Route::get('/{slug?}', 'HomeController@index');
