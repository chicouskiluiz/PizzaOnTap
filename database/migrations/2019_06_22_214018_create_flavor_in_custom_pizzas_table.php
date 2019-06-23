<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlavorInCustomPizzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flavor_in_custom_pizzas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('custom_pizza_id');
            $table->bigInteger('flavor_id');
            $table->timestamps();

            $table->foreign('custom_pizza_id')->references('id')->on('custom_pizzas');
            $table->foreign('flavor_id')->references('id')->on('flavors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flavor_in_custom_pizzas');
    }
}
