<?php

namespace SGM;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
  protected $table = "detalle_venta";
  protected $primaryKey='iddetalle_venta';
  public $timestamps = false;

  protected $fillable = ['idventa','idarticulo','cantidad','precio_pub'];

}
