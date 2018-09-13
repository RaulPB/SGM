<?php

namespace SGM;

use Illuminate\Database\Eloquent\Model;

class Politica extends Model
{
    protected $table = "politicas";
     //protected $primaryKey='idventa';
  protected $fillable = ['politicas','autorizo'];
}
