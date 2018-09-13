<?php

namespace SGM;

use Illuminate\Database\Eloquent\Model;

class Status2 extends Model
{
         protected $table = "status2s";
  protected $fillable = ['status'];

   /*   public function serv()
    {
        return $this->hasOne('SGM\Serv');
    }*/
    public function compras()
    {
        return $this->hasOne('SGM\Compras');
    }
}
