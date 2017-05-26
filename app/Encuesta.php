<?php

namespace Ifiix;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table = "encuestas";
    protected $fillable = ['encuesta','fecha'];
    //protected $fillable = ['fecha'];
}
