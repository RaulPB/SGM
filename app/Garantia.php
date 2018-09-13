<?php

namespace SGM;

use Illuminate\Database\Eloquent\Model;

class Garantia extends Model
{
   protected $table = "garantias";
   protected $fillable = ['garantia'];

   public function serv() 
    {
        return $this->hasOne('SGM\Serv');
    }

}
