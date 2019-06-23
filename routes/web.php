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

Route::post('/register', 'UserController@register')->name('user.register');

Route::get('/admin', 'AdminController@index');
Route::get('/admin/pizzas', 'AdminController@getPizzas');
Route::get('/admin/sabores', 'AdminController@getSabores');
Route::get('/admin/refrigerantes', 'AdminController@getRefrigerantes');
Route::get('/admin/adicionais', 'AdminController@getAdicionais');
Route::get('/admin/tamanhos', 'AdminController@getTamanhos');
Route::get('/admin/usuarios', 'AdminController@getUsuarios');

Route::get('/additional', 'AdditionalController@list');

Route::get('/drink', 'DrinkController@list');

Route::get('/flavor', 'FlavorController@list');

Route::get('/size', 'SizeController@list');