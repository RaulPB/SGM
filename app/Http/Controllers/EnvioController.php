<?php
//ESTE CONTROLLER ES PARA LAS CREACIONES, EDICIONES Y CONTROL DE PERSONAL DE RECEPCIÓN
namespace Ifiix\Http\Controllers;

use Illuminate\Http\Request;

use Ifiix\Http\Requests;
use Ifiix\Http\Controllers\Controller;

use Ifiix\Serv;
use Ifiix\Status2;
use Ifiix\Status;
use Ifiix\User;
use Ifiix\Compras;
use Ifiix\EnRe;
use Ifiix\Proveedor;
use DB;
use Ifiix\Http\Requests\CompraCreate;
use Ifiix\Http\Requests\CompraUpdate;
use Session;
use Redirect;
use Illuminate\Routing\Route; 
use Illuminate\Database\Query\Builder;

class EnvioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)//listaremos todo y solo definiremos un boton de buscar para que se filtre por usuario
    {
        //$recole = EnRe::where('status_id', 18)->orwhere('status_id', 15)->paginate(10);
        $recole = EnRe::id($request->get('id'))->orderBy('id', 'DESC')->paginate(10);
        return view('envio.index',compact('recole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //$proveedor = Proveedor::lists('proveedor', 'id');//
        $status = Status::where('id', 1)->orwhere('id',18)->orwhere('id',15)->lists('status', 'id'); //13 es refaccion solicitada

        //lists('status', 'id');//
        //$servicio = Serv::where('status_id', '<>', 10)->lists('id', 'id');
         $mensajero_id = User::where('perfil_id', '=', 4)->lists('name', 'id');; //id del mensajero;
        return view('envio.create',compact('status','mensajero_id'));//variables a las 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         EnRe::create([ 
        'status_id'=>$request['status_id'],
        'mensajero_id'=>$request['mensajero_id'],
        'Detalle'=>$request['detalle'],
         ]);
         return redirect('/envre')->with('message','Solicitud de recolección creada correctamente');
         //return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)//ESTO ES PARA LISTAR LOS ENVIOS
    {
        $recole = EnRe::id($request->get('id'))->orderBy('id', 'DESC')->paginate(10);
        return view('envio.index',compact('recole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $status = Status::where('id',18)->orwhere('id',15)->orwhere('id',1)->lists('status', 'id'); //13 es refaccion solicitada
        //$status = Status::lists('status', 'id');
         $mensajero_id = User::where('perfil_id', '=', 4)->lists('name', 'id');; //id del mensajero;
         $comp = EnRe::find($id);
    return view('envio.edit',['comp'=>$comp],compact('servicio','proveedor','status','mensajero_id','dire'));
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
        $enre = EnRe::find($id);
        $enre->fill($request->all());  
        $enre->save();
        Session::flash('message','Solicitud de Recolección actualizada correctamente');
       return Redirect::to('/envre');
        //return($enre);
       
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
