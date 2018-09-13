<?php

namespace SGM;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Arch extends Model
{
    protected $table = "arches";//nombre de la tabla
    protected $fillable = ['idserv','observaciones','path'];

    //crearemos un mutador para que al momento de subir los archivos no se duplique el nombre
    public function setPathAttribute($path){
    	$this->attributes['path'] = Carbon::now()->second.$path->getClientOriginalName();
    	$name = Carbon::now()->second.$path->getClientOriginalName();
    	\Storage::disk('local')->put($name, \File::get($path));
    }

        public function scopeId($query, $idserv){ 
      
      if(trim($idserv) != ""){ //TRIM NOS AYUDA A QUE A PESAR DE PONER ESPACIOS NO PASE NADA Y NO SE ALTERE LA CONSULTA
      $query->where('idserv', $idserv);
        }
    }
}

