<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('compras');
            $table->string('costo');
            $table->string('comentarios');
            $table->integer('servicio_id')->unsigned()->nullable(); // llave foranea a servicios (migracion)
            $table->foreign('servicio_id')->references('id')->on('servs'); //antes apuntaba a usuarios por eso el error

            $table->integer('mensajero_id')->unsigned()->nullable(); //es el id del mensajero.
            $table->foreign('mensajero_id')->references('id')->on('users');

            $table->integer('proveedor_id')->unsigned()->nullable(); // llave foranea a servicios (migracion)
            $table->foreign('proveedor_id')->references('id')->on('proveedors');

            $table->string('direccionp');//es la direccion del proveedor

            $table->integer('status_id')->unsigned()->nullable();//apunta al id del status a asignar
            $table->foreign('status_id')->references('id')->on('statuses');


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
        Schema::drop('compras');
    }
}
