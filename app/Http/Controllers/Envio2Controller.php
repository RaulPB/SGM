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
use SGM\EnRe;
use SGM\Proveedor;
use DB;
use SGM\Http\Requests\CompraCreate;
use SGM\Http\Requests\CompraUpdate;
use Session;
use Redirect;
use Illuminate\Routing\Route; 
use Illuminate\Database\Query\Builder;

class Envio2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recole = EnRe::where('status_id', 13)->orWhere('status_id', 19)->paginate(10);
        return view('envio.index2',compact('recole'));
        //return('hola');
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
        $status = Status::where('id',13)->orwhere('id',19)->orwhere('id',16)->lists('status', 'id'); //13 es refaccion solicitada
        //$status = Status::lists('status', 'id');
         $mensajero_id = User::where('perfil_id', '=', 4)->lists('name', 'id');; //id del mensajero;
         $comp = EnRe::find($id);
    return view('envio.edit2',['comp'=>$comp],compact('servicio','proveedor','status','mensajero_id','dire'));
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
