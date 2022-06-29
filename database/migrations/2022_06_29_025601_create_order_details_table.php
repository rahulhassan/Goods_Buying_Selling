<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('o_id');
            $table->string('p_title');
            $table->string('p_price');
            $table->string('p_quantity');
            $table->string('b_name');
            $table->string('b_phn');
            $table->string('b_add');
            $table->string('payment_method');
            $table->string('status');
            //$table->foreignId('b_id')->references('b_id')->on('buyer');
            //$table->foreignId('p_id')->references('p_id')->on('product');
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
        Schema::dropIfExists('order_details');
    }
}
