<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DrinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drinks')->insert([
            'name' => 'Coca-cola',
            'description' => 'Coca-cola 2l',
            'price' => '8.49',
            'image' => 'https://www.bicodepaors.com/wp-content/uploads/2016/10/refrigerantes.jpg'
        ]);

        DB::table('drinks')->insert([
            'name' => 'Pepsi',
            'description' => 'Pepsi 2l',
            'price' => '6.99',
            'image' => 'https://www.bicodepaors.com/wp-content/uploads/2016/10/refrigerantes.jpg'
        ]);

        DB::table('drinks')->insert([
            'name' => 'Guaraná Antarctica',
            'description' => 'Guaraná Antarctica 2l',
            'price' => '5.99',
            'image' => 'https://www.bicodepaors.com/wp-content/uploads/2016/10/refrigerantes.jpg'
        ]);

        DB::table('drinks')->insert([
            'name' => 'Xamego',
            'description' => 'Xamego 7l',
            'price' => '2.99',
            'image' => 'https://www.bicodepaors.com/wp-content/uploads/2016/10/refrigerantes.jpg'
        ]);
    }
}
