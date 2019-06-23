<?php

Auth::routes();

Route::get('/', function () {
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


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', 'HomeController@index')->name('pedidos');
