<?php

namespace Ifiix\Http\Requests;

use Ifiix\Http\Requests\Request;

class ServicioCreate extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
      /*  'receptor' => 'required',
        'nombrecliente'=> 'required',
        'telefono'=> 'required',
        'celular'=>'required',
        'email'=>'required',
        'producto'=>'required',
        'marca'=>'required',
        'modelo'=>'required',
        'tipo'=>'required',
        'color'=>'required',
        'capacidad'=>'required',
        'serie'=>'required',
        'email'=>'required',
        'contraseña'=>'required',
        'compañia'=>'required',
        'reparado'=>'required',
        'agua'=>'required',
        'ingresoso'=>'required',
        'enciende'=>'required',
        'benciende'=>'required',
        'bvolumen'=>'required',
        'bvibrador'=>'required',
        'pantalla'=>'required',
        'touch'=>'required',
        'display'=>'required',
        'ctrasera'=>'required',
        'cfrontal'=>'required',
        'ccarga'=>'required',
        'altavoz'=>'required',
        'microfono'=>'required',
        'auricular'=>'required',
        'boexterna'=>'required',
        'jack'=>'required',
        'wifi'=>'required',
        'bluetooth'=>'required',
        'datosm'=>'required',
        'bateria'=>'required',
        'portasim'=>'required',
        'sim'=>'required',
        'bhome'=>'required',
        'touchid'=>'required',
        'sensorp'=>'required',
        'carcasa'=>'required',
        'teclado'=>'required',
        'señal'=>'required',
        'imei'=>'required',
        'problemacliente'=>'required',
        //'solucion1'=>'required',
        'diagnostico1'=>'required',
        //'diagnostico2'=>'required',
        'fechaentrega'=>'required',
        //'fechanotifica'=>'required',
        'costo'=>'required',

        'status_id'=>'required',
        'tecnico_id'=>'required',
        'receptor'=>'required',
        'fechaentrega'=>'required',
          */  //
        ];
    }
}
