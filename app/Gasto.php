<?php

namespace SGM;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
      protected $table = "gastos";
  	  protected $fillable = ['gasto','razon','genero','sucursal'];
}
