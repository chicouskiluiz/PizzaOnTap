<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomPizzaInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_pizza_in_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('custom_pizza_id');
            $table->bigInteger('order_id');
            $table->timestamps();

            $table->foreign('custom_pizza_id')->references('custom_pizza_id')->on('custom_pizzas');
            $table->foreign('order_id')->references('order_id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_pizza_in_orders');
    }
}
