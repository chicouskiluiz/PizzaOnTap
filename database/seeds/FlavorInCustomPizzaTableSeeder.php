<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlavorInCustomPizzaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flavor_in_custom_pizzas')->insert([
            'custom_pizza_id' => '1',
            'flavor_id' => '1'
        ]);

        DB::table('flavor_in_custom_pizzas')->insert([
            'custom_pizza_id' => '2',
            'flavor_id' => '2'
        ]);

        DB::table('flavor_in_custom_pizzas')->insert([
            'custom_pizza_id' => '3',
            'flavor_id' => '4'
        ]);

        DB::table('flavor_in_custom_pizzas')->insert([
            'custom_pizza_id' => '3',
            'flavor_id' => '5'
        ]);

        DB::table('flavor_in_custom_pizzas')->insert([
            'custom_pizza_id' => '4',
            'flavor_id' => '6'
        ]);

        DB::table('flavor_in_custom_pizzas')->insert([
            'custom_pizza_id' => '4',
            'flavor_id' => '7'
        ]);

        DB::table('flavor_in_custom_pizzas')->insert([
            'custom_pizza_id' => '4',
            'flavor_id' => '9'
        ]);

        DB::table('flavor_in_custom_pizzas')->insert([
            'custom_pizza_id' => '5',
            'flavor_id' => '9'
        ]);

        DB::table('flavor_in_custom_pizzas')->insert([
            'custom_pizza_id' => '5',
            'flavor_id' => '1'
        ]);

        DB::table('flavor_in_custom_pizzas')->insert([
            'custom_pizza_id' => '5',
            'flavor_id' => '6'
        ]);

        DB::table('flavor_in_custom_pizzas')->insert([
            'custom_pizza_id' => '5',
            'flavor_id' => '8'
        ]);
    }
}
