<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view(checkout);
    }

    public function store(Request $request)
    {

    }

    public function get(Request $request)
    {

    }
}
