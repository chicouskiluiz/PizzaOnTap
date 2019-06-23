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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
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

Route::get('/admin', 'AdminController@index');
Route::get('/admin/pizzas', 'AdminController@getPizzas');
Route::get('/admin/sabores', 'AdminController@getSabores');
Route::get('/admin/refrigerantes', 'AdminController@getRefrigerantes');
Route::get('/admin/adicionais', 'AdminController@getAdicionais');
Route::get('/admin/tamanhos', 'AdminController@getTamanhos');
Route::get('/admin/usuarios', 'AdminController@getUsuarios');
