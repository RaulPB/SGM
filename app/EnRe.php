<?php

namespace SGM;

use Illuminate\Database\Eloquent\Model;

class EnRe extends Model
{
    protected $table = "en_res";
  protected $fillable = ['mensajero_id', 'status_id','servicio_id', 'Detalle'];

  public function scopeId($query, $id){       
      if(trim($id) != ""){ 
      $query->where('id', $id);
      }else{
      $query->where('id', $id)->orWhere('status_id', '=', 18)->orWhere('status_id', '=', 15)->get();  
          //$query->where('id', $id)->orWhere('status_id', '<>', '10')->get(); 
        }
    }

       public function mensajero()
    {
        return $this->belongsTo('SGM\User');
    }

           public function status()
    {
        return $this->belongsTo('SGM\Status');
    }

}
