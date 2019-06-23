<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdditionalInCustomPizzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_in_custom_pizzas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('custom_pizza_id');
            $table->bigInteger('additional_id');
            $table->timestamps();

            $table->foreign('custom_pizza_id')->references('id')->on('custom_pizzas');
            $table->foreign('additional_id')->references('id')->on('additionals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('additional_in_custom_pizzas');
    }
}
