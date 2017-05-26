<?php

namespace Ifiix;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
      protected $table = "proveedors";
  protected $fillable = ['proveedor','tipo','ubicacion','telefono','email'];

    	public function proveedor()
    {
        return $this->hasOne('Ifiix\Producto');
    }
}
