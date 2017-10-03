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
    return view('welcome');
});

Auth::routes();

//Route::get('/', 'HomeController@index')->name('home'); //defines pages to which user is redirected on login

Route::get("/findatoilet","FindToiletController@index");

Route::resource('toilets', 'ToiletController');

Route::get('/dashboard', function () {
    // Only authenticated users may enter...
    return view('dashboard');
})->middleware('auth');

