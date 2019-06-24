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

    public function update(Request $request, Additional $additional) {
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

    public function delete(Additional $additional) {
        $additional->delete();

        return response('Success', 200)->header('Content-Type', 'text/plain');
    }
}
