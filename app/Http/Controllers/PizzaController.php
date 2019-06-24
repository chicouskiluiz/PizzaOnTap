<?php

namespace App\Http\Controllers;

use App\Model\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PizzaController extends Controller
{
    public function store(Request $request) {

    }

    public function list() {
        // $pizzas = Pizza::all();

        $pizza = Pizza::find(5);
        dd($pizza->flavors());
    }

    public function update(Request $request) {
    }

    public function delete(Request $request, $additional) {
    }
}
