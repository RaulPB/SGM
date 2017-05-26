<?php

namespace Ifiix;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
     protected $table = "compras";
  protected $fillable = ['compras', 'status_id','costo', 'comentarios', 'servicio_id', 'proveedor_id', 'mensajero_id','direccionp'];
  



       public function status()
    {
        return $this->belongsTo('Ifiix\Status2');
    }

           public function mensajero()//esto es para tener el nombre del mensajero
    {
        return $this->belongsTo('Ifiix\User');
    }



    public function scopeServicio_id($query, $servicio_id){       
      if(trim($servicio_id) != ""){ 
      $query->where('servicio_id', $servicio_id);
      }else{
      $query->where('servicio_id', $servicio_id)->orWhere('status_id', '<>', 4)->where('status_id', '<>', 5)->get();  
          //$query->where('id', $id)->orWhere('status_id', '<>', '10')->get(); 
        }
    }

    /*public function scopeIdss($query, $id){ //PARA EL MENSAJERO y que busque ordenes !!!
      if(trim($id) != ""){
      $query->where('id', $id);

        }else{
         $ids=$_GET['ids']; 
          $query->where('status_id', '<>', 10)->Where('tecnico_id', '=', $ids)->get();
        }
    }*/
}
