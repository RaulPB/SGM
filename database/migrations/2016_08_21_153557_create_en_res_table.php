<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnResTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('en_res', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('mensajero_id')->unsigned()->nullable(); //es el id del mensajero.
            $table->foreign('mensajero_id')->references('id')->on('users');

            $table->integer('status_id')->unsigned()->nullable();//1,13,15,16,18
            $table->foreign('status_id')->references('id')->on('statuses');

            $table->integer('servicio_id')->unsigned()->nullable(); // 
            $table->foreign('servicio_id')->references('id')->on('servs');

            $table->string('Detalle');
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
        Schema::drop('en_res');
    }
}
