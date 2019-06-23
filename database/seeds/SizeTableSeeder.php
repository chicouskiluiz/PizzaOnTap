<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            'name' => 'Pequena',
            'slice' => '6',
            'price' => '19.90',
            'num_flavor' => '1'
        ]);

        DB::table('sizes')->insert([
            'name' => 'Média',
            'slice' => '8',
            'price' => '27.90',
            'num_flavor' => '1'
        ]);

        DB::table('sizes')->insert([
            'name' => 'Grande',
            'slice' => '10',
            'price' => '36.90',
            'num_flavor' => '2'
        ]);

        DB::table('sizes')->insert([
            'name' => 'Gigante',
            'slice' => '12',
            'price' => '42.90',
            'num_flavor' => '3'
        ]);

        DB::table('sizes')->insert([
            'name' => 'Master',
            'slice' => '16',
            'price' => '49.90',
            'num_flavor' => '4'
        ]);
    }
}
