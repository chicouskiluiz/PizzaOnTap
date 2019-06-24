<?php

namespace App\Http\Controllers;

use App\Model\FlavorInPizza;
use App\Model\Pizza;
use Illuminate\Http\Request;

use App\Model\User;
use App\Model\Drink;
use App\Model\Size;
use App\Model\Additional;
use App\Model\Flavor;

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
        $pizzas = Pizza::all();

        foreach ($pizzas as $pizza) {
            $pizza->flavors = $pizza->flavors($pizza->id);
        }

        return view('admin.pizzas', [
            'pizzas' => $pizzas,
            'flavors' => Flavor::all(),
            'relation' => FlavorInPizza::all(),
        ]);
    }

    public function getSabores()
    {
        return view('admin.sabores', [ 'flavors' => Flavor::all() ]);
    }

    public function getBebidas()
    {
        return view('admin.bebidas', [ 'drinks' => Drink::all() ]);
    }

    public function getAdicionais()
    {
        return view('admin.adicionais', [ 'additionals' => Additional::all() ]);
    }

    public function getTamanhos()
    {
        return view('admin.tamanho', [ 'sizes' => Size::all() ]);
    }

    public function getUsuarios()
    {
        return view('admin.usuarios', [ 'users' => User::all() ]);
    }
}
