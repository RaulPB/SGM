<?php

namespace Ifiix;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
     protected $table = "categorias";
   protected $fillable = ['categoria'];

  	public function producto()
    {
        //return $this->hasOne('Ifiix\Producto');
          return $this->belongsTo('Ifiix\Producto', 'id');
    }
}
