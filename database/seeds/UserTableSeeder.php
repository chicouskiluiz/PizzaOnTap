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
            'email' => 'sudow@pot.com',
            'password' => '123qwe!@#',
            'cpf' => '09772899906',
            'isAdmin' => true
        ]);
    }
}
