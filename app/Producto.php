<?php

namespace SGM;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Producto extends Model
{
     protected $table = "productos";
   protected $fillable = ['producto','marca','modelo','precio','cantidad','categoria_id','proveedor_id','preciop','status','sucursal_id'];

   public function categoria()
    {
        return $this->belongsTo('SGM\Categoria');
    }

       public function proveedor()
    {
        return $this->belongsTo('SGM\Proveedor');
    }

       public function salid()
    {
        return $this->hasOne('SGM\Salidas');
    }


     public function scopeIds($query, $modelo){ //Para listar los productos en el inventario

    //  if(trim($modelo) != ""){ //TRIM NOS AYUDA A QUE A PESAR DE PONER ESPACIOS NO PASE NADA Y NO SE ALTERE LA CONSULTA
    //    $query->where('modelo','LIKE',"%$modelo%")->where('status','LIKE', "%Null%");

       //RECUPERAMOS LA SUCURSAL DEL USUARIO LOGUEADO PARA REVISAR SU INVENTARIO
      if(trim($modelo) != ""){ //TRIM NOS AYUDA A QUE A PESAR DE PONER ESPACIOS NO PASE NADA Y NO SE ALTERE LA CONSULTA
        //$query->where('modelo','LIKE',"%$modelo%");
        $user = Auth::user()->sucursal_id;
        $query->where('modelo','LIKE',"%$modelo%")->Where('status',"=", "Activo")->Where('sucursal_id',"=", $user)->get();
        }else{
          $user = Auth::user()->sucursal_id;
         //$query->where('status', "Activo")->orWhere('sucursal_id', '$usuarioa')->get();
          $query->where('status',"=", "Activo")->Where('sucursal_id',"=", $user)->get();

        }
      

        }


        public function scopeId($query, $modelo){ // para listar en metodo de precio al publico

       if(trim($modelo) != ""){ //TRIM NOS AYUDA A QUE A PESAR DE PONER ESPACIOS NO PASE NADA Y NO SE ALTERE LA CONSULTA
        $query->where('modelo','LIKE',"%$modelo%");
        }else{
          $query->where('status', '=', "Activo")->orWhere('modelo', 'LIKE', '%$modelo%');
          //$query->where('status_id', '<>', 10)->where('status_id', '<>', 11)->Where('tecnico_id', '=', $ids)->get();

        }
      

        }






    }
//}
