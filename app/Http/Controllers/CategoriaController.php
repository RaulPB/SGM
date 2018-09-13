<?php

namespace SGM\Http\Controllers;

use Illuminate\Http\Request;
use SGM\Http\Requests;
use SGM\Http\Controllers\Controller;

use SGM\Serv;
use SGM\Status;
use SGM\User;
use SGM\Garantia;
use DB;
use SGM\Http\Requests\ServicioCreate;
use SGM\Http\Requests\ServicioUpdate;
use Session;
use SGM\Categoria;
use Redirect;
use Illuminate\Routing\Route; 
use Illuminate\Database\Query\Builder;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria = Categoria::paginate(5);
        return view('categoria.index',compact('categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Categoria::create([
            'categoria'=>$request['categoria'],
            ]);
        return redirect('/categoria')->with('message','Categoria agregada correctamente');
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
         $categoria = Categoria::find($id);
         return view('categoria.edit',['categoria'=>$categoria]);
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
         $categoria = Categoria::find($id);
        $categoria->fill($request->all());
        $categoria->save();
         Session::flash('message','Categoria Actualizada Correctamente');
        return Redirect::to('/categoria');
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
