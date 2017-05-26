<?php

namespace Ifiix;

use Illuminate\Database\Eloquent\Model;

class Status2 extends Model
{
         protected $table = "status2s";
  protected $fillable = ['status'];

   /*   public function serv()
    {
        return $this->hasOne('Ifiix\Serv');
    }*/
    public function compras()
    {
        return $this->hasOne('Ifiix\Compras');
    }
}
