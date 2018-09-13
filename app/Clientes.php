<?php

namespace SGM;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
  protected $table = "clientes";
  protected $fillable = ['cliente','detalles','facturacion','correo','telefono','celular'];
}
