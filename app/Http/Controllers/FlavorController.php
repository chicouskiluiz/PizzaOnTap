<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Flavor;

class FlavorController extends Controller
{
    public function list() {
        return Flavor::all();
    }
}
