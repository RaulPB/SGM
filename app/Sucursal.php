<?php

namespace Ifiix;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
      protected $table = "sucursals";
  protected $fillable = ['nameS'];

   public function user()
    {
        return $this->hasOne('Ifiix\User');
    }
}
