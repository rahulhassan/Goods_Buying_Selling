<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('b_id')->references('b_id')->on('buyer');
            $table->foreignId('p_id')->references('p_id')->on('product');
            $table->foreignId('s_id')->references('s_id')->on('seller');
            
            $table->string('payment_type');
            $table->string('payment_status');
            $table->string('quantity');
            $table->string('sub_total');
            $table->integer('discount')->nullable();
            $table->string('total');
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
        Schema::dropIfExists('orders');
    }
}
