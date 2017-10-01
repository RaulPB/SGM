<?php

namespace Ifiix\Http\Controllers;

use Illuminate\Http\Request;

use Ifiix\Http\Requests;
use Ifiix\Http\Controllers\Controller;
use Ifiix\Clientes;
use Session;
use Redirect;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = Clientes::paginate(10);
        return view('cliente.index', compact('cliente'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return("hola");
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           Clientes::create([
            'cliente'=>$request['cliente'],
            'telefono'=>$request['telefono'],
            'celular'=>$request['celular'],
            'correo'=>$request['correo'],
            'facturacion'=>$request['facturacion'],
            'detalles'=>$request['detalles'],

        ]);
           Session::flash('message','Cliente registrado correctamente');
       return redirect('/clientes');
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
         //$cliente = Clientes::find($id);
         $cliente = Clientes::find($id);
         return view('cliente.edit',['cliente'=>$cliente]);

    
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
        $user = Clientes::find($id);
        $user->fill($request->all());//metodo para rellenar campos especificados en los modelos
        $user->save();
        Session::flash('message','Cliente Actualizado Correctamente');
        return Redirect::to('/clientes');
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
