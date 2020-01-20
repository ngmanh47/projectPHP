<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('functions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('router')->nullable();
            $table->string('icon')->nullable();
            $table->bigInteger('id_parent')->nullable();

            $table->tinyInteger('showMenu')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
        DB::unprepared('
            CREATE PROCEDURE get_func(IN id bigint(20))
            BEGIN
                select * 
                from funcs
                where id_parent=@id;
            END'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('functions');
        DB::unprepared('DROP PROCEDURE IF EXISTS get_func');
    }
}