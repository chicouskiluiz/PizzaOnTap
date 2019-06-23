<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinkInShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drink_in_shopping_carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('drink_id');
            $table->bigInteger('shopping_cart_id');
            $table->timestamps();

            $table->foreign('drink_id')->references('id')->on('drinks');
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
        Schema::dropIfExists('drink_in_shopping_carts');
    }
}
