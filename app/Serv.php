<?php

namespace Ifiix;

use Illuminate\Database\Eloquent\Model;

class Serv extends Model
{
     protected $table = "servs";
  protected $fillable = ['nombrecliente','fechaingreso','telefono','celular','email','producto','marca','modelo','tipo','color',
'capacidad','serie','imei','contraseña','compañia','reparado','agua','ingresoso','enciende','benciende','bvolumen','bvibrador',
'pantalla','touch','display','ctrasera','cfrontal','ccarga','altavoz','microfono','auricular','boexterna','jack','wifi','bluetooth',
'datosm','bateria','portasim','sim','bhome','touchid','sensorp','carcasa','teclado','señal','problemacliente','solucion1','diagnostico1',
'diagnostico2','fechaentrega','fechanotifica','costo','costoajustado','razon','status_id','tecnico_id','receptor','garantia','tipopago1','tipopago2','abono1','abono2','fechapago1','fechapago2'];


    public function tecnico()//el tecnico es un usuario con este perfil, pero queremos el nombre del usuario no el status
    {
        return $this->belongsTo('Ifiix\User');
    }

      public function status()
    {
        return $this->belongsTo('Ifiix\Status');
    }

    public function scopeId($query, $imei){ //este es para listar el index en vistas de servicios //FALTA PAREMETRO PARA PASAR ID DE USUARIO

      if(trim($imei) != ""){ //TRIM NOS AYUDA A QUE A PESAR DE PONER ESPACIOS NO PASE NADA Y NO SE ALTERE LA CONSULTA
      $query->where('imei', $imei);
        }else{
          $query->where('imei', $imei)->orWhere('status_id', '<>', '10')->where('status_id', '<>', '11')->where('status_id', '<>', '16')->where('status_id', '<>', '18')->where('status_id', '<>', '8')->where('status_id', '<>', '21')->get();  //esta es la consulta sin filtro
        }
    }

      public function scopeIds($query, $imei){//este es para listar en index de receptor los entregados

      if(trim($imei) != ""){ //TRIM NOS AYUDA A QUE A PESAR DE PONER ESPACIOS NO PASE NADA Y NO SE ALTERE LA CONSULTA
      $query->where('imei', $imei);
        }else{
          $query->where('imei', $imei)->orWhere('status_id', '=', '10')->orWhere('status_id', '=', '11')->orWhere('status_id', '=', '8')->orWhere('status_id', '=', '21')->get(); //para separar las ordenes que ya se entregaron y mpstrar todo en el index aunque no se ingrese busqueda.
        }
    }


    public function scopeIdss($query, $imei){ //PARA EL TECNICO y que busque ordenes !!!
      if(trim($imei) != ""){
      $query->where('imei', $imei);

        }else{
         $ids=$_GET['ids']; //FILTRO PARA IDENTIFICAR EL ID DEL TECNICO Y DARLE SOLO SUS ORDENES
          $query->where('status_id', '<>', 10)->Where('tecnico_id', '=', $ids)->get();
        }
    }

        public function garantia()
    {
        return $this->belongsTo('Ifiix\Garantia');
    }

}
