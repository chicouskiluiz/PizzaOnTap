<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Flavor;

class FlavorController extends Controller
{
    public function store(Request $request) {
        $flavor= new Drink($request->all());

        $flavor->saveOrFail();

        return response('Success', 200)->header('Content-Type', 'text/plain');
    }

    public function list() {
        return Flavor::all();
    }

    public function update(Request $request, Flavor $flavor) {
        $flavor->update($request->all());

        try {
            $flavor->save();

            return redirect()
                ->back()
                ->with('alert-success', 'Atualizado!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha ao atualizar!');
        }
    }

    public function delete(Flavor $flavor) {
        $flavor->delete();

        return response('Success', 200)->header('Content-Type', 'text/plain');
    }
}
