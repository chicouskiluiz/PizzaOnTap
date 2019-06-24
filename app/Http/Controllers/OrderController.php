<?php

namespace App\Http\Controllers;

use App\Model\Order;
use Illuminate\Http\Request;
use App\Model\Adress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        return view('checkout', [ 'address' => DB::table('adresses')->where('user_id', Auth::user()->id)->get() ]);
    }

    public function store(Request $request)
    {

    }

    public function get(Request $request)
    {

    }
}
