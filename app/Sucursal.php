<?php

namespace Ifiix;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
      protected $table = "sucursals";
  protected $fillable = ['nameS','direccion','clavenota','contador'];

   public function user()
    {
        return $this->hasOne('Ifiix\User');
    }
}
