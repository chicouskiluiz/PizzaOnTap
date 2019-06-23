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

Route::get('/cardapio', function () {
    return view('cardapio');
});

Route::get('/montesua', function () {
    return view('monte');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/user', 'Auth\LoginController@showUserLoginForm');
Route::get('/login/client', 'Auth\LoginController@showClientLoginForm');
Route::get('/register/user', 'Auth\RegisterController@showUserRegisterForm');
Route::get('/register/client', 'Auth\RegisterController@showClientRegisterForm');

Route::post('/login/user', 'Auth\LoginController@userLogin');
Route::post('/login/client', 'Auth\LoginController@clientLogin');
Route::post('/register/user', 'Auth\RegisterController@createUser');
Route::post('/register/client', 'Auth\RegisterController@createCLient');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin');
Route::view('/writer', 'writer');
