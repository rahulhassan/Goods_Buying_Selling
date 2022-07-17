<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderQueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_queue', function (Blueprint $table) {
            $table->id('o_id');
            $table->string('o_quantity');
            $table->string('o_amount');
            $table->foreignId('buyer_id')->references('b_id')->on('buyer');
            $table->foreignId('product_id')->references('p_id')->on('product');
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
        Schema::dropIfExists('order_queue');
    }
}
