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
    return view('cardapio',
        [
            'products' => json_encode([
                "1" => "Teste",
            ])
        ]);
});

Route::get('/montesua', function () {
    return view('monte');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
