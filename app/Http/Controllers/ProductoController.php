<?php

namespace SGM\Http\Controllers;

use Illuminate\Http\Request;

use SGM\Http\Requests;
use SGM\Http\Controllers\Controller;
use SGM\Http\Requests\UserCreateRequest;
use SGM\Http\Requests\UserUpdateRequest;
use SGM\Http\Requests\productoCreate;
use SGM\Http\Requests\productoEdit;
use SGM\Perfil;//IMPORTANTE INCLUIR EL MODELO PARA QUE LO PUEDA LISTAR
use SGM\Proveedor; //IMPORTANTE INCLUIR EL MODELO PARA QUE LO PUEDA LISTAR
use SGM\User;
use SGM\Serv;
use SGM\Producto;
use SGM\Categoria;
use Input;
use Select;
use Session;
use Redirect;
use Auth;
use DB;
use Illuminate\Routing\Route;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$prod = Producto::paginate(10);
        
        $prod = Producto::ids($request->get('categoria'))->paginate(1000);
        return view('producto.index', compact('prod'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prov = Proveedor::lists('proveedor', 'id');
        $cat = Categoria::lists('categoria', 'id');
        //ANEXAMOS LOS STATUS PARA LOS PRODUCTOS
         $st["Activo"]="Activo";
         $st["Baja"]="Baja";

         return view('producto.create',compact('prov','cat','st'));//variables a las que asigne campos reales de la base de datos
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productoCreate $request)
    {
         //$proveedor_id = Input::get('proveedor_id');
          $proveedor = $request['proveedor_id'];
          $catego = $request['categoria_id'];


         if ($proveedor == NULL || $catego == NULL){
            return redirect('/producto')->with('message','NO SE GUARDO POR FAVOR REVISE PROVEEDOR Ó CATEGORIA');

            }else{
            //'proveedor_id'=>$request['proveedor_id'],
        //RECUPERAMOS EL ID DEL USUARIO QUE REGISTRA LA SUCURSAL PARA DARLE ALMACENAMIENTO EN SU INVENTARIO.
                $user = Auth::user()->sucursal_id;

            Producto::create([
            'marca'=>$request['marca'],
            'modelo'=>$request['modelo'],
            'precio'=>$request['precio'],
            'cantidad'=>$request['cantidad'],
            'proveedor_id'=>$request['proveedor_id'],
            'categoria_id'=>$request['categoria_id'],
            'preciop'=>$request['preciop'],
            'status'=>$request['status'],
            'sucursal_id'=>$user,
        ]);
            return redirect('/producto')->with('message','Producto agregado correctamente a inventario');
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
        $prod = Producto::find($id);
        $prov = Proveedor::lists('proveedor', 'id');
        $cat = Categoria::lists('categoria', 'id');
        $st["Activo"]="Activo";
        $st["Baja"]="Baja";
        $sucursal_id = Auth::user()->sucursal_id;
        $idsucur = DB::table('sucursals')->where('id', '=', $sucursal_id)->pluck('nameS');
        return view('producto.edit',['prod'=>$prod],compact('prov','cat','st','idsucur'));
        //return($idsucur);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(productoEdit $request, $id)
    {
        $prod = Producto::find($id);
        $cantidad = $prod->cantidad;//RECUPERAMOS LA CANTIDAD QUE ESTABA ORIGINALMENTE
        $cantidad2 = $request->input("cantidad"); //RECUPERAMOS LA NUEVA CANTIDAD QUE INGRESAMOS EN EL FORMULARIO

        if($cantidad2 < $cantidad){
            Session::flash('message','No se puede reducir el inventario en este modulo');
            return Redirect::to('/producto');
        }else{//($cantidad2 > $cantidad)

        $prod = Producto::find($id);
        $prod->fill($request->all());
        $prod->save();
         Session::flash('message','Producto Actualizado Correctamente !!!!');
        return Redirect::to('/producto');
        }
       /* $prod->fill($request->all());
         Session::flash('message','Producto Actualizado Correctamente');
        return Redirect::to('/producto');*/

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
