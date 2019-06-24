<?php

namespace App\Http\Controllers;

use App\Model\Adress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function get() {
        return Adress::find(Auth::user()->id);
    }
}
