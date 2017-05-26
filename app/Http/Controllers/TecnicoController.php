<?php

namespace Ifiix\Http\Controllers;

use Illuminate\Http\Request;

use Ifiix\Http\Requests;
use Ifiix\Http\Controllers\Controller;

use Ifiix\Serv;
use Ifiix\Status;
use Ifiix\User;
use Ifiix\Tpago;
use DB;
use Ifiix\Http\Requests\ServicioCreate;
use Ifiix\Http\Requests\ServicioUpdate;
use Session;
use Redirect;
use Illuminate\Routing\Route; 
use Illuminate\Database\Query\Builder;
use Log;
use Ifiix\Garantia;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)//vamos a listarle al tecnico todo las ordenes de servicio que tiene asignadas y que no estan terminadas
    {
        /*$ids=$_GET['ids']; 
        $servicio = Serv::where('tecnico_id', $ids)
            ->Where(function($query){
                $query->where('status_id', '<>', 10)
               ->where('status_id', '<>', 11)
               ->where('status_id', '<>', 8)
               ->where('status_id', '<>', 7)
               ->where('status_id', '<>', 6);             
            })
            ->paginate(10);*/
           

           
             $servicio = Serv::idss($request->get('imei'))->paginate(500);

        
        return view('tecnico.index',compact('servicio')); //'servicio'
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
         $servicio = Serv::find($id);
         $status = Status::lists('status', 'id'); 
         $user = User::where('perfil_id', 3)->lists('name', 'id'); 
         $garantia = Garantia::lists('garantia','id');
         $pagor = Tpago::lists('pago', 'id');
         return view('tecnico.edit',['servicio'=>$servicio],compact('status','user','garantia','pagor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServicioUpdate $request, $id)//FALTAN LOS REQUEST
    {

        $servicio = Serv::find($id);
        $servicio->fill($request->all());
        $servicio->save();
        Session::flash('message','Orden actualizada');
        //return Redirect::to('/tecnico'); //ESTE ES EL ORIGINAL
        //return Redirect::back();//->with('success', ['LOGRADO']); 
        
        return Redirect::to('/admin');//->with('success'); con esto regresamo al menu principal

       // return redirect('/encuesta/create')->with('message','Información almacenada');

        //return view('tecnico.edit2',['servicio'=>$servicio],compact('status','user','garantia','pagor'));
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
