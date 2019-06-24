<?php

namespace App\Http\Controllers;

use App\Model\Drink;
use App\Model\Pizza;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index() {
        return view('cardapio', [
            'pizzas' => Pizza::all(),
            'drinks' => Drink::all(),
        ]);
    }
}
