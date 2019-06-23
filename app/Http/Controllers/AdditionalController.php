<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Additional;

class AdditionalController extends Controller
{
    public function list() {
        return Additional::all();
    }
}
