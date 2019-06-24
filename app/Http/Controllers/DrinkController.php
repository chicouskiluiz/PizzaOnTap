<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Drink;

class DrinkController extends Controller
{
    public function store(Request $request) {
        $drink = new Drink($request->all());

        $drink->saveOrFail();

        return response('Success', 200)->header('Content-Type', 'text/plain');
    }

    public function list() {
        return Drink::all();
    }

    public function update(Request $request, Drink $drink) {
        $drink->update($request->all());

        try {
            $drink->save();

            return redirect()
                ->back()
                ->with('alert-success', 'Atualizado!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha ao atualizar!');
        }
    }

    public function delete(Drink $drink) {
        $drink->delete();

        return response('Success', 200)->header('Content-Type', 'text/plain');
    }
}
