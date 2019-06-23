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

Route::get('/admin', 'AdminController@index')->name('pedidos');
