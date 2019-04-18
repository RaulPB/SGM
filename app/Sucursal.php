<?php

namespace SGM;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
      protected $table = "sucursals";
  protected $fillable = ['nameS','direccion','clavenota','contador','status'];

   public function user()
    {
        return $this->hasOne('SGM\User');
    }

    public function salid()
    {
        return $this->hasOne('SGM\Salidas');
    }
}
