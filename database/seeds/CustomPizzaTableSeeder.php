<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomPizzaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('custom_pizzas')->insert([
            'size_id' => '1'
        ]);

        DB::table('custom_pizzas')->insert([
            'size_id' => '2'
        ]);

        DB::table('custom_pizzas')->insert([
            'size_id' => '3'
        ]);

        DB::table('custom_pizzas')->insert([
            'size_id' => '4'
        ]);

        DB::table('custom_pizzas')->insert([
            'size_id' => '5'
        ]);
    }
}
