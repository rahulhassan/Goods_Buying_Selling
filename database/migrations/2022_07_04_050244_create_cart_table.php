<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id('c_id');
            $table->foreignId('buyer_id')->references('b_id')->on('buyer');
            $table->foreignId('product_id')->references('p_id')->on('product');
            $table->integer('p_price');
            $table->integer('p_quantity');
            $table->foreignId('seller_id')->references('s_id')->on('seller');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}
