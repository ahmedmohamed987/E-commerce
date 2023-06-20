<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shoppingcart_id')->unsigned()->nullable();
            $table->string('payment_type');
            $table->integer('shipping');
            $table->double('order_cost');
            $table->timestamps();

            $table->foreign('shoppingcart_id')->references('id')
                    ->on('shoppingcarts')->onDelete('cascade');
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
};
