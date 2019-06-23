<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Model\User;
use App\Model\Adress;

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

        Storage::put('file.txt', $user);

        $adress = Adress::create([
            'user_id' => $user->id,
            'cep' => $request->cep,
            'address' => $request->address,
            'number' => $request->number,
            'neighborhood' => $request->neighborhood,
            'complement' => $request->complement,
        ]);

        return redirect('/');
    }

    public function list() {
        return User::all();
    }
}
