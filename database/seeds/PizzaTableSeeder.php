<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizzas')->insert([
            'name' => 'Pequena 1',
            'size_id' => '1',
            'price' => '20.00',
            'description' => 'Pequna Mussarela'
        ]);

        DB::table('pizzas')->insert([
            'name' => 'Média 1',
            'size_id' => '2',
            'price' => '28.00',
            'description' => 'Média Calabresa'
        ]);

        DB::table('pizzas')->insert([
            'name' => 'Grande 2',
            'size_id' => '3',
            'price' => '35.00',
            'description' => 'Grande 5 Queijos e bacon'
        ]);

        DB::table('pizzas')->insert([
            'name' => 'Gigante 3',
            'size_id' => '4',
            'price' => '43.00',
            'description' => 'Escarola, Napolitana e Siciliana'
        ]);

        DB::table('pizzas')->insert([
            'name' => 'Master 4',
            'size_id' => '5',
            'price' => '50.00',
            'description' => 'Siciliana, Mussarela, Escarola e Portuguesa'
        ]);
    }
}
