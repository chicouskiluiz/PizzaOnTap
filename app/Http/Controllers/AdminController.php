<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pedidos');
    }

    public function getPizzas()
    {
        return view('admin.pizzas');
    }

    public function getSabores()
    {
        return view('admin.sabores');
    }

    public function getRefrigerantes()
    {
        return view('admin.refrigerantes');
    }

    public function getAdicionais()
    {
        return view('admin.adicionais');
    }

    public function getTamanhos()
    {
        return view('admin.tamanho');
    }

    public function getUsuarios()
    {
        return view('admin.usuarios');
    }
}
