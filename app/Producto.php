<?php

namespace Ifiix;

use Illuminate\Database\Eloquent\Model;
use DB;

class Producto extends Model
{
     protected $table = "productos";
   protected $fillable = ['producto','marca','modelo','precio','cantidad','categoria_id','proveedor_id','preciop'];


    public function categorias()//NO OLVIDAR QUE ESTO LO MOSTRAMOS EN EL INDICE Y NOS PERMITE ALCANZAR UN DATO LEJANO CON SU IDº
  {
      return $this->belongsTo('Ifiix\Categoria', 'categoria_id');//le indico que el cliente_id es la llave con la que
      //biscar en la tabla de clientes
  }

       public function proveedor()
    {
        return $this->belongsTo('Ifiix\Proveedor');
    }

       public function salid()
    {
        return $this->hasOne('Ifiix\Salidas');
    }


    public function scopeId($query, $modelo){ //este es para listar el index en vistas de servicios //FALTA PAREMETRO PARA PASAR ID DE USUARIO

      if(trim($modelo) != ""){ //TRIM NOS AYUDA A QUE A PESAR DE PONER ESPACIOS NO PASE NADA Y NO SE ALTERE LA CONSULTA
        $query->where('modelo','LIKE',"%$modelo%");

        }
    }
}
