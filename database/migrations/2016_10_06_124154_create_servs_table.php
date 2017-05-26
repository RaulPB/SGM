<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombrecliente');
            $table->datetime('fechaingreso');
            $table->string('telefono');
            $table->string('celular');
            $table->string('email');
            $table->string('producto');
            $table->string('marca');
            $table->string('modelo');
            $table->string('tipo');
            $table->string('color');
            $table->string('capacidad');
            $table->string('serie');
            $table->string('imei');
            $table->string('contraseña');
            $table->string('compañia');
            $table->string('reparado');
            $table->string('agua');
            $table->string('ingresoso');
            $table->string('enciende');
            $table->string('benciende');
            $table->string('bvolumen');
            $table->string('bvibrador');
            $table->string('pantalla');
            $table->string('touch');
            $table->string('display');
            $table->string('ctrasera');
            $table->string('cfrontal');
            $table->string('ccarga');
            $table->string('altavoz');
            $table->string('microfono');
            $table->string('auricular');
            $table->string('boexterna');
            $table->string('jack');
            $table->string('wifi');
            $table->string('bluetooth');
            $table->string('datosm');
            $table->string('bateria');
            $table->string('portasim');
            $table->string('sim');
            $table->string('bhome');
            $table->string('touchid');
            $table->string('sensorp');
            $table->string('carcasa');
            $table->string('teclado');
            $table->string('señal');
            $table->string('problemacliente');
            $table->string('solucion1');
            $table->string('diagnostico1');
            $table->string('diagnostico2');
            $table->datetime('fechaentrega');
            $table->datetime('fechanotifica');
            $table->datetime('fechapago1');
            $table->datetime('fechapago2');
            $table->string('costo');
            $table->string('costoajustado');
            $table->string('razon');

            $table->string('tipopago1');//-->estos salen de otro modelo (tarjeta/efectivo) en tpagos
            $table->string('abono1');
            $table->string('tipopago2');//-->estos salen de otro modelo (tarjeta/efectivo) en tpagos
            $table->string('abono2');

            $table->string('garantia');

            $table->integer('status_id')->unsigned()->nullable();//apunta al id del status a asignar
            $table->foreign('status_id')->references('id')->on('statuses');


            $table->integer('tecnico_id')->unsigned()->nullable();//apunta al id del tecnico a asignar
            $table->foreign('tecnico_id')->references('id')->on('users');

            $table->string('receptor'); //variable apsada despues de loguearse.
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
        Schema::drop('servs');
    }
}
