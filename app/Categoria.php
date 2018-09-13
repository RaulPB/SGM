<?php

namespace SGM;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
     protected $table = "categorias";
   protected $fillable = ['categoria'];

  	public function producto()
    {
        //return $this->hasOne('SGM\Producto');
          return $this->belongsTo('SGM\Producto', 'id');
    }
}
