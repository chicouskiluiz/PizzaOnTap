<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Drink;

class DrinkController extends Controller
{
    public function list() {
        return Drink::all();
    }
}
