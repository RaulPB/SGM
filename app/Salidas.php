<?php

namespace Ifiix;

use Illuminate\Database\Eloquent\Model;

class Salidas extends Model
{
      protected $table = "salidas";
   protected $fillable = ['producto_id','servicio_id','cantidad','comentarios'];

    public function producto()
    {
        return $this->belongsTo('Ifiix\Producto');
    }
}
