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

    public function delete(Flavor $flavor) {
        $flavor->delete();

        return response('Success', 200)->header('Content-Type', 'text/plain');
    }
}
