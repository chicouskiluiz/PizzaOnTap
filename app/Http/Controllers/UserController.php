<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Model\User;

class UserController extends Controller
{
    public function register(Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'cpf' => $request->cpf,
            'phone' => $request->phone,
            'isAdmin' => false
        ]);

        return redirect('/');
    }
}
