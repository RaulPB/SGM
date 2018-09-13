<?php

namespace SGM\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use SGM\Serv;
use SGM\Arch;
use Session;
use Redirect;
use SGM\Http\Requests;
use SGM\Http\Controllers\Controller;

class DiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $servicio = Arch::id($request->get('idserv'))->paginate(5);
      return view('archivo.index',compact('servicio'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //LE MANDAREMOS EL LISTADO DE ORDENES DE SERVICIO EN ESTATUS RECIBIDA, PARA QUE SE PUEDAN SUBIR ARCHIVOS
        $serv  = Serv::where('status_id','<>',8)->Where('status_id','<>',10)->Where('status_id','<>',11)->get()->lists('id','id');
        //$user = User::where('perfil_id', 3)->lists('name', 'id');
        return view('archivo.create',compact('serv'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Arch::create($request->all());
        Arch::create([
            'idserv'=>$request['orden'],
            'observaciones'=>$request['observaciones'],
            'path'=>$request['path'],

            ]);
        //return "Guardado chavo";
        return redirect('/archivo');
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
