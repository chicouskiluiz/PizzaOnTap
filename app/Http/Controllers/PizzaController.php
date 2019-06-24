<?php

namespace App\Http\Controllers;

use App\Model\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function store(Request $request) {
        $pizza = Pizza::create($request->all());
        $pizza->save;

        $pizza->updateFlavors($pizza->id, $request->flavors);

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
        $pizza = Pizza::find($request->id);
        $pizza->update($request->all());

        try {
            $pizza->updateFlavors($pizza->id, $request->flavors);
            $pizza->save();

            return redirect()
                ->back()
                ->with('alert-success', 'Atualizado!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha ao atualizar!');
        }
    }

    public function delete(Request $request, $pizza) {
        $pizza = Pizza::find($pizza);
        $pizza->delete();

        return response('Success', 200)->header('Content-Type', 'text/plain');
    }
}
