<?php

namespace SGM;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
     protected $table = "perfils";
  	  protected $fillable = ['perfil'];

  	public function user() //metodos definidos para mostrar datos relacionados de otras tablas segun el campo que se le especifique; en este case se esta llamando en index de vista usuarios.
    {
        return $this->hasOne('SGM\User');
    }
}
