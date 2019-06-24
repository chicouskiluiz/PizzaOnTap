<?php

namespace App\Http\Controllers;

use App\Model\Additional;
use App\Model\Flavor;
use App\Model\Size;
use Illuminate\Http\Request;

class MakeOurPizzaController extends Controller
{
    public function index() {
        $flavor = Flavor::all();
        $size = Size::all();
        $additional = Additional::all();

        return view('monte', [
            'flavor' => $flavor,
            'size' => $size,
            'additional' => $additional,
        ]);
    }
}
