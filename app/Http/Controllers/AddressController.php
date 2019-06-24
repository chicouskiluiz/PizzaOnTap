<?php

namespace App\Http\Controllers;

use App\Model\Adress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function get() {
        return DB::table('adresses')->where('user_id', Auth::user()->id)->get();
    }
}
