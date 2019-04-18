<?php

namespace SGM;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
use Cookie;

class Serv extends Model
{
     protected $table = "servs";
     //protected $primaryKey='idventa';
  protected $fillable = ['nombrecliente','fechaingreso','telefono','celular','email','producto','marca','modelo','tipo','color',
'capacidad','serie','imei','contraseña','compañia','reparado','agua','ingresoso','enciende','benciende','bvolumen','bvibrador',
'pantalla','touch','display','ctrasera','cfrontal','ccarga','altavoz','microfono','auricular','boexterna','jack','wifi','bluetooth',
'datosm','bateria','portasim','sim','bhome','touchid','sensorp','carcasa','teclado','señal','problemacliente','solucion1','diagnostico1',
'diagnostico2','fechaentrega','fechanotifica','costo','costoajustado','razon','status_id','tecnico_id','receptor','garantia','tipopago1','tipopago2','tipopago3','tipopago4','tipopago5','abono1','abono2','abono3','abono4','abono5','fechapago1','fechapago2','fechapago3','fechapago4','fechapago5','comunicacion','bitacoracontacto','sucursal','idservpc','idservtablet'];


    public function tecnico()//el tecnico es un usuario con este perfil, pero queremos el nombre del usuario no el status
    {
        return $this->belongsTo('SGM\User');
    }

      public function status()
    {
        return $this->belongsTo('SGM\Status');
    }

    public function scopeId($query, $id){ //este es para listar el index en vistas de servicios //FALTA PAREMETRO PARA PASAR ID DE USUARIO
      $user = Auth::user()->sucursal_id; //extraemos id del usuario logueado.
      if(trim($id) != ""){ //TRIM NOS AYUDA A QUE A PESAR DE PONER ESPACIOS NO PASE NADA Y NO SE ALTERE LA CONSULTA
      $query->where('id', $id)->Where('sucursal',"=", $user);
        }else{
          $query->where('id', $id)->orWhere('status_id', '<>', '10')->where('status_id', '<>', '11')->where('status_id', '<>', '16')->where('status_id', '<>', '18')->where('status_id', '<>', '8')->Where('sucursal',"=", $user)->get();
        }
    }

      public function scopeIds($query, $id){//este es para listar en index de receptor los entregados

      if(trim($id) != ""){ //TRIM NOS AYUDA A QUE A PESAR DE PONER ESPACIOS NO PASE NADA Y NO SE ALTERE LA CONSULTA
      $query->where('id', $id);
        }else{
          $query->where('id', $id)->orWhere('status_id', '=', '10')->orWhere('status_id', '=', '11')->orWhere('status_id', '=', '8')->orWhere('status_id', '=', '21')->get(); //para separar las ordenes que ya se entregaron y mpstrar todo en el index aunque no se ingrese busqueda.
        }
    }


    public function scopeIdss($query, $id){ //PARA EL TECNICO y que busque ordenes !!!
      $user = Auth::user()->sucursal_id; //extraemos id del usuario logueado.
      if(trim($id) != ""){
         $ids = Cookie::get('Cookie2');// esta linea es nueva
      $query->where('id', $id)->Where('sucursal',"=", $user);

        }else{
          $ids = Cookie::get('Cookie2');//la cookie es el id del tecnico
         //$ids=$_GET['ids']; //FILTRO PARA IDENTIFICAR EL ID DEL TECNICO Y DARLE SOLO SUS ORDENES
          $query->where('status_id', '<>', 10)->where('status_id', '<>', 8)->where('status_id', '<>', 11)->Where('tecnico_id', '=', $ids)->Where('sucursal',"=", $user)->get();
        }
    }

     public function scopeIdsss($query, $id){ //funcion para ayudar a buscar al cliente
      
      if(trim($id) != ""){ //TRIM NOS AYUDA A QUE A PESAR DE PONER ESPACIOS NO PASE NADA Y NO SE ALTERE LA CONSULTA
      $query->where('id', $id);
        }else{
          $query->where('id', 50000000000)->get();
        }
    }

     public function scopeIdssss($query, $nombrecliente){ //funcion para ayudar a buscar al cliente
      
      if(trim($nombrecliente) != ""){ //TRIM NOS AYUDA A QUE A PESAR DE PONER ESPACIOS NO PASE NADA Y NO SE ALTERE LA CONSULTA
      $query->where('nombrecliente','LIKE', "%$nombrecliente%");
        }else{
          $query->where('nombrecliente', 50000000000)->get();
        }
    }



        public function garantia()
    {
        return $this->belongsTo('SGM\Garantia');
    }

}
