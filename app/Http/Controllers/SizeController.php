<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Size;

class SizeController extends Controller
{
    public function list() {
        return Size::all();
    }
}
