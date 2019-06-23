<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePizzaInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_in_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pizza_id');
            $table->bigInteger('order_id');
            $table->timestamps();

            $table->foreign('pizza_id')->references('id')->on('pizzas');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizza_in_orders');
    }
}
