<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdditionalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('additionals')->insert([
            'name' => 'Bacon extra',
            'description' => 'Bacon extra',
            'price' => '4.00'
        ]);

        DB::table('additionals')->insert([
            'name' => 'Borda recheada',
            'description' => 'Borda recheada',
            'price' => '5.00'
        ]);

        DB::table('additionals')->insert([
            'name' => 'Calabresa ralada',
            'description' => 'Calabresa ralada',
            'price' => '2.50'
        ]);

        DB::table('additionals')->insert([
            'name' => 'Milho',
            'description' => 'Milho',
            'price' => '1.00'
        ]);
    }
}
