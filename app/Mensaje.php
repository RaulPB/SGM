<?php

namespace SGM;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
   protected $table = "mensajes";
   protected $fillable = ['mensaje'];
}
