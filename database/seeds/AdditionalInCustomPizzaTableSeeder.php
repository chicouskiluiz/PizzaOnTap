<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdditionalInCustomPizzaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('additional_in_custom_pizzas')->insert([
            'custom_pizza_id' => '1',
            'additional_id' => '1'
        ]);

        DB::table('additional_in_custom_pizzas')->insert([
            'custom_pizza_id' => '2',
            'additional_id' => '2'
        ]);

        DB::table('additional_in_custom_pizzas')->insert([
            'custom_pizza_id' => '3',
            'additional_id' => '3'
        ]);

        DB::table('additional_in_custom_pizzas')->insert([
            'custom_pizza_id' => '4',
            'additional_id' => '4'
        ]);

        DB::table('additional_in_custom_pizzas')->insert([
            'custom_pizza_id' => '5',
            'additional_id' => '1'
        ]);

        DB::table('additional_in_custom_pizzas')->insert([
            'custom_pizza_id' => '5',
            'additional_id' => '2'
        ]);
    }
}
