<?php

namespace SGM;

use Illuminate\Database\Eloquent\Model;

class Pc extends Model
{
  protected $table = "pc";
  protected $fillable = ['idserv','marca','modelo','tipo','memoria','procesador','serie','abierto','mojado','sistema','enciende','cargador','nocargador','bisagras','bateria','funcionabateria','fpantalla','fdisco','fmemoria','fteclado','ftouch','fcamara','lectora','flectora','color','disco'];
}
