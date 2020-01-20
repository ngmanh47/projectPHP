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
            $table->bigIncrements('id');
            $table->bigInteger('numOrder')->nullable();
            $table->bigInteger('id_cus')->nullable();
            $table->date('orderDate')->nullable();
            $table->date('orderDelivery')->nullable();
            $table->double('total')->unsigned()->nullable();
            $table->tinyInteger('sttOrder')->nullable();
            $table->string('portage')->nullable(); // van chuyen
            $table->string('payment')->nullable(); // thanh toan
            
            $table->tinyInteger('status')->nullable();
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