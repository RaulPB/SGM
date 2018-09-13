<?php

namespace SGM\Http\Controllers;

use Illuminate\Http\Request;
use SGM\Http\Requests;
use SGM\Http\Controllers\Controller;

use Redirect;
use Session;
use Illuminate\Routing\Route;
use SGM\Status;
use SGM\Http\Requests\StatusCreateRequest;//PARA VALIDACIONES DE CAMPOS REQUERIDOS
use SGM\Http\Requests\StatusUpdateRequest;//PARA VALIDACIONES DE CAMPOS REQUERIDOS  statu
class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Status::paginate(5);
        return view('status.indexst',compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('status.createst');//LLAMAMOS PRIMERO A ESTA VISTA PARA GUARDAR STATUS
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusCreateRequest $request)
    {
        Status::create([
            'status'=>$request['status'],
            ]);
        return redirect('/status')->with('message','Status agregado correctamente');
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
        $status = Status::find($id);
         return view('status.editst',['status'=>$status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatusUpdateRequest $request, $id)
    {
        $status = Status::find($id);
        $status->fill($request->all());
        $status->save();
         Session::flash('message','Status Actualizada Correctamente');
        return Redirect::to('/status');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Status::destroy($id);
        Session::flash('message','Status Eliminado Correctamente');
        return Redirect::to('/status');
    }
}
