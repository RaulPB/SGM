<?php

namespace Ifiix\Http\Controllers;

use Illuminate\Http\Request;

use Ifiix\Http\Requests;
use Ifiix\Http\Controllers\Controller;
use Ifiix\Http\Requests\UserCreateRequest;
use Ifiix\Http\Requests\UserUpdateRequest;
use Ifiix\Perfil;//IMPORTANTE INCLUIR EL MODELO PARA QUE LO PUEDA LISTAR
use Ifiix\Proveedor; //IMPORTANTE INCLUIR EL MODELO PARA QUE LO PUEDA LISTAR
use Ifiix\User;
use Session;
use Redirect;
use Illuminate\Routing\Route; 

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prov = Proveedor::paginate(10);
        return view('proveedor.index', compact('prov'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedor.create');//LLAMAMOS PRIMERO A ESTA VISTA PARA GUARDAR GARANTIAS
        //return('hola');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Proveedor::create([
            'proveedor'=>$request['proveedor'],
            'tipo'=>$request['tipo'],
            'ubicacion'=>$request['ubicacion'],
            'telefono'=>$request['telefono'],
            'email'=>$request['email'],
        ]);
        return redirect('/proveedor')->with('message','Proveedor registrado correctamente'); //mandamos vista con mensaje que se 
        
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
        $prov = Proveedor::find($id);
        return view('proveedor.edit',['prov'=>$prov]);
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
        $prov = Proveedor::find($id);
        $prov->fill($request->all());
        $prov->save();
         Session::flash('message','Proveedor Actualizado Correctamente');
        return Redirect::to('/proveedor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Proveedor::destroy($id);
        Session::flash('message','Proveedor Eliminado Correctamente');
        return Redirect::to('/proveedor');
    }
}
