<?php

namespace SGM;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
  protected $table = "notas";
  protected $fillable = ['nota','fecha','venta','abono1','abono2','abono3','abono4','abono5','detalle','entrega','tipo'];

  public function scopeIds($query, $venta){ //este es para listar el index en vistas de servicios //

    if(trim($venta) != ""){ //TRIM NOS AYUDA A QUE A PESAR DE PONER ESPACIOS NO PASE NADA Y NO SE ALTERE LA CONSULTA
    $query->where('venta','LIKE', "%$venta%");
      }
  }


}
