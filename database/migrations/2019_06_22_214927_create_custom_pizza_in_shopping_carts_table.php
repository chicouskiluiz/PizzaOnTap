<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomPizzaInShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_pizza_in_shopping_carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('custom_pizza_id');
            $table->bigInteger('shopping_cart_id');
            $table->timestamps();

            $table->foreign('custom_pizza_id')->references('id')->on('custom_pizzas');
            $table->foreign('shopping_cart_id')->references('id')->on('shopping_carts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_pizza_in_shopping_carts');
    }
}
