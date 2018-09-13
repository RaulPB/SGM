<?php

namespace SGM\Http\Controllers;

use Illuminate\Http\Request;

use SGM\Http\Requests;
use SGM\Http\Controllers\Controller;
use SGM\Garantia;
use Redirect;
use Session;
use Illuminate\Routing\Route;
use DB;

class GarantiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gar = Garantia::paginate(5);
        return view('garantia.indexgar',compact('gar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('garantia.creategar');//LLAMAMOS PRIMERO A ESTA VISTA PARA GUARDAR GARANTIAS
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Garantia::create([
            'garantia'=>$request['garantia'],
        ]);
        return redirect('/garantia')->with('message','Garantia agregada correctamente'); //mandamos vista con mensaje que se 
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
        $garantia = Garantia::find($id);
         return view('garantia.editgar',['garantia'=>$garantia]);
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
        $garantia = Garantia::find($id);
        $garantia->fill($request->all());
        $garantia->save();
        Session::flash('message','Garantia Actualizada Correctamente');
        return Redirect::to('/garantia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*$garantia = Garantia::find($id);
        Sucursal::destroy($id);
        Session::flash('message','Sucursal Eliminada Correctamente y Usuario Reubicado a matriz.');
        return Redirect::to('/sucursal');*/
    }
}
