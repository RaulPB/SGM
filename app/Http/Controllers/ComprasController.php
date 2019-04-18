<?php

namespace SGM\Http\Controllers;

use Illuminate\Http\Request;

use SGM\Http\Requests;
use SGM\Http\Controllers\Controller;

use SGM\Serv;
use SGM\Status2;
use SGM\Status;
use SGM\User;
use SGM\Compras;
use SGM\Proveedor;
use DB;
use SGM\Http\Requests\CompraCreate;
use SGM\Http\Requests\CompraUpdate;
use Session;
use Redirect;
use Auth;
use Illuminate\Routing\Route; 
use Illuminate\Database\Query\Builder;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // $comp = Compras::where('status_id', '<>', 3)->where('status_id', '<>', 4)->paginate(10); /
        //
         $idlogueado = Auth::user()->sucursal_id; //extraemos id sucursl del usuario para filtrar las compras de esa sucursal

       //$comp = Compras::servicio_id($request->get('servicio_id'))->orderBy('id', 'DESC')->paginate(10);


       $comp = Compras::where('sucursal_id',$idlogueado)->where('status_id', '<>', 5)->orderBy('id', 'DESC')->paginate(10);

       return view('compras.index',compact('comp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idlogueado = Auth::user()->sucursal_id; //recuperamos la sucursal del tecnico solicitante de refacción.



        $proveedor = Proveedor::lists('proveedor', 'id');//
        $status = Status2::where('id', 1)->lists('status', 'id'); //13 es refaccion solicitada
        $servicio = Serv::where('sucursal',$idlogueado)->where('status_id', '<>', 10)->orderBy('id', 'asc')->lists('id', 'id'); //agregue el orden
        $mensajero_id = User::where('perfil_id', '=', 4)->lists('name', 'id');; //id del mensajero;
        return view('compras.create',compact('servicio','proveedor','status','mensajero_id','idlogueado'));//variables a las que asigne campos reales de la base de datos
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompraCreate $request)
    {
        $idserv = $request['servicio_id'];
        $sucursal = DB::table('servs')->where('id', '=', $idserv)->pluck('sucursal');//stock original
        

       Compras::create([ 
        'compras'=>$request['compras'],
        'costo'=>$request['costo'],
        'comentarios'=>$request['comentarios'],
        'servicio_id'=>$request['servicio_id'],
        'proveedor_id'=>$request['proveedor_id'],
        'status_id'=>$request['status_id'],
        'mensajero_id'=>$request['mensajero_id'],
        'sucursal_id'=>  $sucursal  ]);
       //return "GUARDADO DE PRUEBA ACTIVO Y CORRECTO";
       return redirect('/compras/create')->with('message','Solicitud de refacción creada correctamente');
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
        $comp = Compras::find($id);
        $proveedor = Proveedor::lists('proveedor', 'id');//
        $mensajero_id = User::where('perfil_id', '=', 4)->lists('name', 'id');; //id del mensajero;
        $status = Status2::lists('status', 'id');
        $servicio = Serv::where('status_id', '<>', 10)->lists('id', 'id');
        return view('compras.edit',['comp'=>$comp],compact('servicio','proveedor','status','mensajero_id'));

         
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
        $comp = Compras::find($id);
        $comp->fill($request->all());//metodo para rellenar campos especificados en los modelos  
        $comp->save();
        Session::flash('message','Solicitud de refacción actualizada correctamente');
        return Redirect::to('/compras');
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
