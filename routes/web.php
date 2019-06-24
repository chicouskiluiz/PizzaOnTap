<?php

Route::get('/', function () {
    return view('home');
});

Route::get('/cardapio', function () {
    return view('cardapio');
});
Route::get('/montesua', function () {
    return view('monte');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('pedidos');

Route::get('/user/list', 'UserController@list');
Route::post('/register', 'UserController@register')->name('user.register');

Route::middleware(['isAdmin'])->group(function () {
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/pizzas', 'AdminController@getPizzas');
    Route::get('/admin/sabores', 'AdminController@getSabores');
    Route::get('/admin/bebidas', 'AdminController@getBebidas');
    Route::get('/admin/adicionais', 'AdminController@getAdicionais');
    Route::get('/admin/tamanhos', 'AdminController@getTamanhos');
    Route::get('/admin/usuarios', 'AdminController@getUsuarios');
});

Route::get('/additional', 'AdditionalController@list');
Route::post('/additional', 'AdditionalController@store');
Route::put('/additional/{id}', 'AdditionalController@update');
Route::delete('/additional/{id}', 'AdditionalController@delete');

Route::get('/drink', 'DrinkController@list');
Route::post('/drink', 'DrinkController@store');
Route::put('/drink/{id}', 'DrinkController@update');
Route::delete('/drink/{id}', 'DrinkController@delete');

Route::get('/flavor', 'FlavorController@list');
Route::post('/flavor', 'FlavorController@store');
Route::put('/flavor/{id}', 'FlavorController@update');
Route::delete('/flavor/{id}', 'FlavorController@delete');

Route::get('/size', 'SizeController@list');
Route::post('/size', 'SizeController@store');
Route::put('/size/{id}', 'SizeController@update');
Route::delete('/size/{id}', 'SizeController@delete');
