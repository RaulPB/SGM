<?php

namespace SGM\Http\Controllers;

use Illuminate\Http\Request;

use SGM\Http\Requests;
use SGM\Http\Controllers\Controller;
use SGM\Sucursal;
use SGM\User;
use Redirect;
use Session;
use Illuminate\Routing\Route;
use DB;
use SGM\Gasto;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('gasto.createsuc');//LLAMAMOS PRIMERO A ESTA VISTA PARA GUARDAR EL GASTO
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = $request['genero'];//nombre de usuario
        $idsucur = DB::table('users')->where('name', '=', $usuario)->pluck('sucursal_id');//id de sucursal
        Gasto::create([
            'genero'=>$request['genero'],
            'gasto'=>$request['gasto'],
            'razon'=>$request['razon'],
            'sucursal'=>$idsucur,
        ]);
        return redirect('/gasto/create')->with('message','Gasto anexado a listado de hoy'); //mandamos vista con mensaje que se
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
