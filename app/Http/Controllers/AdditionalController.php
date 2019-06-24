<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Additional;

class AdditionalController extends Controller
{
    public function store(Request $request) {
        $additional = new Additional($request->all());

        $additional->saveOrFail();

        return response('Success', 200)->header('Content-Type', 'text/plain');
    }

    public function list() {
        return Additional::all();
    }

    public function update(Request $request) {
        $additional = Additional::find($request->id);
        $additional->update($request->all());

        try {
            $additional->save();

            return redirect()
                ->back()
                ->with('alert-success', 'Atualizado!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha ao atualizar!');
        }
    }

    public function delete(Request $request, $additional) {
        $additional = Drink::find($additional+1);
        $additional->delete();

        return response('Success', 200)->header('Content-Type', 'text/plain');
    }
}
