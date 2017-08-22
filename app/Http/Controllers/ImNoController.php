<?php

namespace Ifiix\Http\Controllers;

use Illuminate\Http\Request;

use Ifiix\Http\Requests;
use Ifiix\Http\Controllers\Controller;
use Redirect;
use DB;
use Ifiix\Garantia;
use Ifiix\Notas;
use Ifiix\Serv;

use Illuminate\Database\Query\Builder;


class ImNoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $notas = Notas::ids($request->get('venta'))->paginate(30);
      //$nota = Notas::paginate(1000);
      return view('notas.index',compact('notas'));
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
      $notas = Notas::find($id); //encontramos la nota
      $venta = $notas->venta; //extraemos el numero de la venta
      $servicio = Serv::find($venta);//buscamos la venta con el id recuperado


      $nota = $notas->id;
      $cliente = $servicio->nombrecliente;
      $modelo = $servicio->modelo;
      $diagnostico2 = $servicio->diagnostico2;
      $marca = $servicio->marca;
      $telefono=$servicio->telefono;
      $celular=$servicio->celular;
      $anticipo1=$notas->abono1;
      $anticipo2=$notas->abono2;
      $anticipo3=$notas->abono3;
      $anticipo4=$notas->abono4;
      $anticipo5=$notas->abono5;
      $total=$servicio->costo;
      $fecha=$notas->created_at;
      $letras = \NumeroALetras::convertir($total);

      //return($cliente);

      $view =  \View::make('pdf.invoice00', compact('nota','cliente','letras','diagnostico2','modelo','marca','telefono','celular','anticipo1','anticipo2','anticipo3','anticipo4','anticipo5','total','fecha'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->setPaper('A3', 'portrait');
      $pdf->loadHTML($view);
      return $pdf->stream("Orden ".$id);
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
