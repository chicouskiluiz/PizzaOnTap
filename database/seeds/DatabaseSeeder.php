<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::beginTransaction();

        $this->call(UserTableSeeder::class);
        $this->call(SizeTableSeeder::class);
        $this->call(FlavorTableSeeder::class);
        $this->call(AdditionalTableSeeder::class);
        $this->call(DrinkTableSeeder::class);
        $this->call(PizzaTableSeeder::class);
        $this->call(FlavorInPizzaTableSeeder::class);
        $this->call(CustomPizzaTableSeeder::class);
        $this->call(FlavorInCustomPizzaTableSeeder::class);
        $this->call(AdditionalInCustomPizzaTableSeeder::class);

        DB::commit();
        Model::reguard();
    }
}
