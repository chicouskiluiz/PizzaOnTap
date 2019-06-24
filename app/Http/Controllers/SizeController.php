<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Size;

class SizeController extends Controller
{
    public function store(Request $request) {
        $size = new Size($request->all());

        $size->saveOrFail();

        return response('Success', 200)->header('Content-Type', 'text/plain');
    }

    public function list() {
        return Size::all();
    }

    public function update(Request $request) {
        $size = Drink::find($request->id);
        $size->update($request->all());

        try {
            $size->save();

            return redirect()
                ->back()
                ->with('alert-success', 'Atualizado!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha ao atualizar!');
        }
    }

    public function delete(Request $request, $size) {
        $size = Drink::find($size);
        $size->delete();

        return response('Success', 200)->header('Content-Type', 'text/plain');
    }
}
