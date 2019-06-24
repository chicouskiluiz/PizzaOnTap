<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Drink;
use Illuminate\Support\Facades\Storage;

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

    public function update(Request $request) {
        $drink = Drink::find($request->id);
        Storage::put('file.txt', $drink);
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

    public function delete(Request $request, $drink) {
        $drink = Drink::find($drink+1);
        $drink->delete();

        return response('Success', 200)->header('Content-Type', 'text/plain');
    }
}
