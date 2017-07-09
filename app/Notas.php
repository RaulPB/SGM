<?php

namespace Ifiix;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
  protected $table = "notas";
  protected $fillable = ['nota','fecha','venta'];

}
