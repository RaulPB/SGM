<?php

namespace SGM;

use Illuminate\Database\Eloquent\Model;

class Tablet extends Model
{
  protected $table = "tablet";
  protected $fillable = ['idserv','marcat','modelot','tipot','colort','memoriat','procesadort','seriet','reparadot','aguat','sistemat','enciendet','cargadort','seriecargadort','golpeadot','bateriat','pantallat','discot','toucht','camaradt','camaratt','altavozt','jackt','wifit','sensort','blut','datosmt','ccargat'];
}
