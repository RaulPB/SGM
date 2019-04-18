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
use SGM\Sucursal;
use Session;
use Redirect;
use Illuminate\Routing\Route; 
use Auth;


class Salidas22Controller extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         //$salida = Salidas::paginate(10);

        
        $idlogueado = Auth::user()->sucursal_id;
       
        $salida = Salidas::paginate(20);
        return view('salida.index',compact('salida'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //vamos a mover el inventario de una sucursal a otra. si no existe el producto se crea. IMportante avisar esto
    {   $idlogueado = Auth::user()->sucursal_id; //extraemos id del usuario logueado.
        $prod = Producto::where('sucursal_id',"=", $idlogueado)->where("status", "=", "Activo")->lists('modelo', 'id');
        //$prod = Producto::lists('modelo', 'id'); 
        $serv = Sucursal::where('id', '<>', $idlogueado)->lists('nameS', 'id');
        return view('salida.create3',compact('prod','serv'));
           
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

       if ($cantidad2 == ""){
        Session::flash('msg1',"ERROR: Producto no guardado por campo 'cantidad' vacio");
        return Redirect::to('/salida2');
       } else{
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
        $idlogueado1 = Auth::user()->name;  
        $idlogueado = Auth::user()->sucursal_id;
         Salidas::create([
            'realizo' => $idlogueado1,
            'servicio_id'=>$request['servicio_id'],
            'producto_id'=>$request['producto_id'],
            'cantidad'=>$request['cantidad'],
            'comentarios'=>$request['comentarios'],
            'origen' =>  $idlogueado,
            'status' => 'Enviado',

        ]);
        //return redirect('/producto')->with('message','Producto salio correctamente de inventario');
         
         Session::flash('notify',"Transferencia registrada");
        return Redirect::to('/salida2'); 
        }
        }
        
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

        $serv = Salidas::find($id);
        return view('salida.create2',compact('serv'));


      
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

        $serv = Salidas::find($id);
       
       //$serv->fill($request->all());//metodo para rellenar campos especificados en los modelos
        $status=$request->get('status');
        $serv->status= $status; 
        $serv->save();


        
        //Session::flash('message','Producto recibido en sucursal, por favor darlo de alta en inventario!!!');
        //return Redirect::to('/producto');
         Session::flash('msg','Recepción realizada. Ingrese producto a inventario ');
        return Redirect::to('/producto'); 
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
