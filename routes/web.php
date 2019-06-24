<?php

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

Route::get('/admin', 'HomeController@index')->name('pedidos');

Route::get('/user/list', 'UserController@list');
Route::post('/register', 'UserController@register')->name('user.register');

Route::get('/admin', 'AdminController@index');
Route::get('/admin/pizzas', 'AdminController@getPizzas');
Route::get('/admin/sabores', 'AdminController@getSabores');
Route::get('/admin/refrigerantes', 'AdminController@getRefrigerantes');
Route::get('/admin/adicionais', 'AdminController@getAdicionais');
Route::get('/admin/tamanhos', 'AdminController@getTamanhos');
Route::get('/admin/usuarios', 'AdminController@getUsuarios');

Route::get('/additional', 'AdditionalController@list');
Route::post('/additional', 'AdditionalController@store');
Route::delete('/additional/{id}', 'AdditionalController@delete');

Route::get('/drink', 'DrinkController@list');
Route::post('/drink', 'DrinkController@store');
Route::delete('/drink/{id}', 'DrinkController@delete');

Route::get('/flavor', 'FlavorController@list');
Route::post('/flavor', 'FlavorController@store');
Route::delete('/flavor/{id}', 'FlavorController@delete');

Route::get('/size', 'SizeController@list');
Route::post('/size', 'SizeController@store');
Route::delete('/size/{id}', 'SizeController@delete');
