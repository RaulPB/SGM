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
use DB;
use Illuminate\Routing\Route; 
use Auth;


class SalidasController extends Controller
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

        $salida = Salidas::where('origen',"=", $idlogueado)->orWhere('servicio_id',"=", $idlogueado)->orderBy('created_at', 'desc')->paginate(20);
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

        if ($cantidad2 == ""){
            Session::flash('msg1',"ERROR: Producto no guardado por campo 'cantidad' vacio");
            return Redirect::to('/salida');
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
            return Redirect::to('/salida'); 
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


        
        $perfil=Auth::user()->perfil_id; //para saber que vista de inventario mandarle
        $recibio=Auth::user()->name; //para saber que vista de inventario mandarle


        if($perfil != 10){ 
        
        //METODO PARA GUARDAR PRODUCTO YA EXISTENTE EN LA SUCURSAL DESTINO
        $idselectp=$request->get('idproducto'); //id del producto seleccionado en el select de la sucursal origen
        if($idselectp != ""){
        
        $pmodificable = Producto::find($idselectp); //ubicamos el producto de la sucursal
        $enviada = $request->get('cantidade');//recuperamos la cantidad enviada
        $cantiori = $pmodificable->cantidad;
        $nuevacantidad = $cantiori + $enviada;
        $pmodificable->cantidad = $nuevacantidad;
        $pmodificable->save(); //GUARDAMOS EL PRODUCTO YA EXISTENTE
        }else{
            //Recuperaremos todos los datos del producto origen para crear uno nuevo en nuestra sucursal destino.   
            $productoorigenid = $serv->producto_id; //recuperamos el id del producto origen.
            $productoorigen = Producto::find($productoorigenid);
            $productoorigenmarca = $productoorigen->marca;
            $productoorigenmodelo = $productoorigen->modelo;
            $productoorigenprecio = $productoorigen->precio;
            $productoorigencantidad = $request->get('cantidade');
            $productoorigencategoria = $productoorigen->categoria_id;
            $productoorigenproveedor = $productoorigen->proveedor_id;
            $productoorigenpreciop = $productoorigen->preciop;
            $productoorigenstatus = "Activo";
            $productoorigensucursaldestino = $serv->servicio_id;
            //////////////////////////////////////////////////////////////////////////////////////////////////
             Producto::create([
            'marca'=>$productoorigenmarca,
            'modelo'=>$productoorigenmodelo,
            'precio'=>$productoorigenprecio,
            'cantidad'=>$productoorigencantidad,
            'proveedor_id'=>$productoorigenproveedor,
            'categoria_id'=>$productoorigencategoria,
            'preciop'=>$productoorigenpreciop,
            'status'=>$productoorigenstatus,
            'sucursal_id'=>$productoorigensucursaldestino,
        ]);

            
        }
        //////////////////////////////////////////////////////////////////////

            $serv->status= "Recibido"; 
            $serv->recibio= $recibio; 
            $serv->save();

        $nombreproducto = DB::table('productos')->where('id', '=', $serv->producto_id)->pluck('modelo');//stock original
        $nombresucursal = DB::table('sucursals')->where('id', '=', $serv->servicio_id)->pluck('nameS');//stock original


        Session::flash('msg','Recepción finalizada correctamente');
        return Redirect::to('/producto'); 
        
        }else{

        //METODO PARA GUARDAR PRODUCTO YA SEA QUE EXISTA O NO
        $idselectp=$request->get('idproducto'); //id del producto seleccionado en el select de la sucursal origen
        if($idselectp != ""){

        $pmodificable = Producto::find($idselectp); //ubicamos el producto destino.
        $enviada = $request->get('cantidade');//recuperamos la cantidad enviada
        $cantiori = $pmodificable->cantidad;
        $nuevacantidad = $cantiori + $enviada;
        $pmodificable->cantidad = $nuevacantidad;
        $pmodificable->save(); //GUARDAMOS EL PRODUCTO YA EXISTENTE
        }else{
            //Recuperaremos todos los datos del producto origen para crear uno nuevo en nuestra sucursal destino.   
            $productoorigenid = $serv->producto_id; //recuperamos el id del producto origen.
            $productoorigen = Producto::find($productoorigenid);
            $productoorigenmarca = $productoorigen->marca;
            $productoorigenmodelo = $productoorigen->modelo;
            $productoorigenprecio = $productoorigen->precio;
            $productoorigencantidad = $request->get('cantidade');
            $productoorigencategoria = $productoorigen->categoria_id;
            $productoorigenproveedor = $productoorigen->proveedor_id;
            $productoorigenpreciop = $productoorigen->preciop;
            $productoorigenstatus = "Activo";
            $productoorigensucursaldestino = $serv->servicio_id;
            //////////////////////////////////////////////////////////////////////////////////////////////////
             Producto::create([
            'marca'=>$productoorigenmarca,
            'modelo'=>$productoorigenmodelo,
            'precio'=>$productoorigenprecio,
            'cantidad'=>$productoorigencantidad,
            'proveedor_id'=>$productoorigenproveedor,
            'categoria_id'=>$productoorigencategoria,
            'preciop'=>$productoorigenpreciop,
            'status'=>$productoorigenstatus,
            'sucursal_id'=>$productoorigensucursaldestino,
        ]);

            
        }
        //////////////////////////////////////////////////////////////////////

        $serv->status= "Recibido"; 
        $serv->recibio= $recibio; 
        $serv->save();
             $nombreproducto = DB::table('productos')->where('id', '=', $serv->producto_id)->pluck('modelo');//stock original
             $nombresucursal = DB::table('sucursals')->where('id', '=', $serv->servicio_id)->pluck('nameS');//stock original

             Session::flash('msg','Recepción finalizada correctamente');
             return Redirect::to('/producto2'); 
         }

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
