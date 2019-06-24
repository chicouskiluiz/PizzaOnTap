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

    public function delete(Size $size) {
        $size->delete();

        return response('Success', 200)->header('Content-Type', 'text/plain');
    }
}
