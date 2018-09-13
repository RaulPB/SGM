<?php

namespace SGM\Http\Controllers;

use Illuminate\Http\Request;
use SGM\Http\Requests;
use SGM\Http\Controllers\Controller;
//necesarios para mi validación.
use SGM\Http\Requests\SucursalCreate;//PARA VALIDACIONES DE CAMPOS REQUERIDOS
use SGM\Http\Requests\SucursalUpdate;//PARA VALIDACIONES DE CAMPOS REQUERIDOS  nameS
use SGM\Sucursal;
use SGM\User;
use Redirect;
use Session;
use Illuminate\Routing\Route;
use DB;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucur = Sucursal::paginate(5);
        return view('sucursal.indexsuc',compact('sucur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sucursal.createsuc');//LLAMAMOS PRIMERO A ESTA VISTA PARA GUARDAR SUCURSALES
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SucursalCreate $request)
    {
        //return "lo guarde";
        Sucursal::create([
            'nameS'=>$request['nameS'],
            'direccion'=>$request['direccion'],
            'clavenota'=>$request['clavenota'],
            'contador'=>0,
        ]);
        return redirect('/sucursal')->with('message','Sucursal Creada Correctamente'); //mandamos vista con mensaje que se
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
         $sucursal = Sucursal::find($id);
         return view('sucursal.editsuc',['sucursal'=>$sucursal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SucursalUpdate $request, $id)
    {
        $sucursal = Sucursal::find($id);
        $sucursal->fill($request->all());
        $sucursal->save();
        Session::flash('message','Sucursal Actualizada Correctamente');
        return Redirect::to('/sucursal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suc = Sucursal::find($id); //METODO CREADO PARA QUE AL ELIMINAR ALGUNA SUCURSAL, LOS USUARIOS DADOS DE ALTA EN ESTA SE PASEN A LA SUCURSAL CON ID DE MATRIZ
        $idSuc = $suc->id;
        $affectedRows = User::where('sucursal_id', '=', $idSuc)->update(['sucursal_id' => 1]);
        Sucursal::destroy($id);
        Session::flash('message','Sucursal Eliminada Correctamente y Usuario Reubicado a matriz.');
        return Redirect::to('/sucursal');
    }
}
