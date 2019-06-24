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
        return Pizza::all();
    }

    public function getFlavors($id) {
        try {
            $pizza = Pizza::findOrFail($id);

            return $pizza->flavors($id);
        } catch (\Exception $e) {
            return response('Not Found', 404)->header('Content-Type', 'text/plain');
        }
    }

    public function update(Request $request) {
        dd($request);
    }

    public function delete(Request $request, $pizza) {
        $pizza = Drink::find($pizza);
        $pizza->delete();

        return response('Success', 200)->header('Content-Type', 'text/plain');
    }
}
