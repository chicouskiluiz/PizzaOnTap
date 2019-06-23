<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlavorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flavors')->insert([
            'name' => 'Mussarela',
            'description' => 'Ingredientes: Molho, mussarela, tomate em rodelas e orégano.'
        ]);

        DB::table('flavors')->insert([
            'name' => 'Calabresa',
            'description' => 'Ingredientes: Molho, mussarela, calabresa, cebola fatiada e orégano.'
        ]);

        DB::table('flavors')->insert([
            'name' => 'Alho e Óleo',
            'description' => 'Ingredientes: Molho, mussarela, alho, azeite de oliva e orégano.'
        ]);

        DB::table('flavors')->insert([
            'name' => '5 Queijos',
            'description' => 'Ingredientes: Molho, mussarela, provolone, gorgonzola, parmesão, catupiry e orégano.'
        ]);

        DB::table('flavors')->insert([
            'name' => 'Milho com Bacon',
            'description' => 'Ingredientes: Molho, mussarela, milho, bacon, parmesão e orégano.'
        ]);

        DB::table('flavors')->insert([
            'name' => 'Escarola',
            'description' => 'Ingredientes: Molho, chicória refogada com azeite de oliva e alho e mussarela.'
        ]);

        DB::table('flavors')->insert([
            'name' => 'Napolitana',
            'description' => 'Ingredientes: Molho, mussarela, tomates em rodelas, parmesão, azeitonas e orégano.'
        ]);

        DB::table('flavors')->insert([
            'name' => 'Portuguesa',
            'description' => 'Ingredientes: Molho, mussarela, presunto, calabresa, ovos, cebola, azeitonas e orégano.'
        ]);

        DB::table('flavors')->insert([
            'name' => 'Siciliana',
            'description' => 'Ingredientes: Molho, mussarela, calabresa, cebola fatiada, parmesão e orégano.'
        ]);

        DB::table('flavors')->insert([
            'name' => 'Lombo com Catupiry',
            'description' => 'Ingredientes: Molho, mussarela, lombo tipo canadense, catupiry e orégano.'
        ]);

        DB::table('flavors')->insert([
            'name' => 'Surprise Motherf * * ker',
            'description' => 'Mystery'
        ]);

        DB::table('flavors')->insert([
            'name' => 'Pizza Ratão',
            'description' => 'Todos os sabores mais o que enccontrar no chão'
        ]);
    }
}
