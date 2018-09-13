<?php

namespace SGM\Http\Controllers;

use Illuminate\Http\Request;

use SGM\Http\Requests;
use SGM\Http\Controllers\Controller;
use SGM\Http\Requests\UserCreateRequest;
use SGM\Http\Requests\UserUpdateRequest;
use SGM\Perfil;//IMPORTANTE INCLUIR EL MODELO PARA QUE LO PUEDA LISTAR
use SGM\Proveedor; //IMPORTANTE INCLUIR EL MODELO PARA QUE LO PUEDA LISTAR
use SGM\User;
use SGM\Serv;
use SGM\Producto;
use SGM\Categoria;
use SGM\Salidas;
use Session;
use Redirect;
use Illuminate\Routing\Route; 


class SalidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $salida = Salidas::paginate(10);
        return view('salida.index',compact('salida'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prod = Producto::lists('modelo', 'id'); 
        $serv = Serv::where('status_id', '<>', 10)->lists('id', 'id');
        return view('salida.create',compact('prod','serv'));
           
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cantidad2 = $request->input("cantidad");//CANTIDAD QUE QUIERO RETIRAR
        $id = $request->input("producto_id");//RECUPERO EL ID DEL PRODUCTO QUE VOY A EDITAR
        $prod = Producto::find($id);//BUSCO EL PRODUCTO ANTES DE EDITARLO
        $cantidad = $prod->cantidad;//CANTIDAD ACTUAL EN EL INVENTARIO ANTES DE EDITAR


        if($cantidad2 > $cantidad){
            Session::flash('message','No existe suficiente producto en inventario para ser retirado');
            return Redirect::to('/salida/create');
        }else{

            ////REDUCIMOS EL INVENTARIO//
        $prod = Producto::find($id);
        //$post1->body = 'Contenido 1';$prod->fill($request->all());
        $total = $cantidad - $cantidad2;
        $prod->cantidad = $total;
        $prod->save();

        //////////////////CREAMOS LA SALIDA////////   
         Salidas::create([
            'servicio_id'=>$request['servicio_id'],
            'producto_id'=>$request['producto_id'],
            'cantidad'=>$request['cantidad'],
            'comentarios'=>$request['comentarios'],

        ]);
        return redirect('/producto')->with('message','Producto salio correctamente de inventario');
        }
        /*Salidas::create([
            'servicio_id'=>$request['servicio_id'],
            'producto_id'=>$request['producto_id'],
            'cantidad'=>$request['cantidad'],
            'comentarios'=>$request['comentarios'],

        ]);
        return redirect('/salida')->with('message','Producto salio correctamente de inventario');*/
        return ($cantidad2);
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
