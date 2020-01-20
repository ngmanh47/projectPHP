<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('sku')->nullable();
            $table->string('name')->nullable();
            $table->decimal('unitprice',8,2)->unsigned()->nullable();
            $table->string('unit')->nullable();
            $table->integer('qty')->unsigned()->nullable();
            $table->text('desc')->nullable();
            $table->text('detail')->nullable();
            $table->text('image')->nullable();
            $table->text('listImg')->nullable();
            $table->text('alias')->nullable();
            $table->string('keyWord')->nullable();
            $table->text('description')->nullable();
            $table->text('imgShare')->nullable();
            //
            $table->bigInteger('id_cat')->unsigned();
            $table->bigInteger('id_sup')->unsigned();
            $table->bigInteger('id_bra')->unsigned();
            //
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
        Schema::dropIfExists('products');
    }
}