<?php

use Illuminate\Database\Seeder;
use App\Model\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'SUdoW',
            'email' => 'sudow@pizza.com',
            'password' => '123qwe!@#',
            'cpf' => '09772899906',
            'isAdmin' => true
        ]);

        $user = User::create([
            'name' => 'client',
            'email' => 'client@pizza.com',
            'password' => 'secret',
            'cpf' => '09772899907',
            'isAdmin' => false
        ]);
    }
}
