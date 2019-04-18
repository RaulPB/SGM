<?php

namespace SGM\Http\Controllers;

use Illuminate\Http\Request;
use SGM\Encuesta;
use SGM\Http\Requests;
use SGM\Http\Controllers\Controller;
use Session;
use Redirect;
 use Cookie;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Array[0]="Correo";
        $Array[1]="Espectacular";
        $Array[2]="Publicación (Diaria/Revista)";
        $Array[3]="Visite el local";
        $Array[4]="Recomendación";
        $Array[5]="Medallón autobus";
        $Array[6]="Flechas";
        $Array[7]="Redes sociales";
        $Array[8]="Sitio web";
        $Array[9]="Google";
        $Array[10]="Otro negocio";
        $Array[11]="Otro";
        return view('encuesta.create',compact('Array'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $hoy = \Carbon\Carbon::now();
      $hoy = $hoy->format('Y-m-d');
         Encuesta::create([
            'encuesta'=>$request['encuesta'],
            'fecha'=>$hoy,
            ]);
        //return redirect('/servicio')->with('message','Información de orden almacenada correctamente');
         $ids = Cookie::get('Orden');
          Session::flash('msg','Orden de servicio '.$ids. ' registrada correctamente');
            return Redirect::to('servicio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
