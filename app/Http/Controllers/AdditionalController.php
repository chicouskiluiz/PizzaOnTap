<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Additional;

class AdditionalController extends Controller
{
    public function store(Request $request) {
        $additional = new Additional($request->all());

        $additional->saveOrFail();

        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }

    public function list() {
        return Additional::all();
    }
}
