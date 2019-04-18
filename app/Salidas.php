<?php

namespace SGM;

use Illuminate\Database\Eloquent\Model;

class Salidas extends Model
{
      protected $table = "salidas";
   protected $fillable = ['producto_id','servicio_id','cantidad','comentarios','realizo','origen','status'];

    public function producto()
    {
        return $this->belongsTo('SGM\Producto');
    }

}
