<?php

namespace Ifiix\Http\Controllers;

use Illuminate\Http\Request;
use Ifiix\Serv;
use Ifiix\Http\Requests;
use Ifiix\Http\Controllers\Controller;
use Redirect;
use DB;
use Ifiix\Garantia;
use Ifiix\Notas;

class ReparaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('layouts.contru');
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
    {  //NECESITAMOS CREAR AL FINAL JUSTO ANTES DE GUARDAR EL NUMERO DE LA NOTA CON EL QUE VAMOS A GUARDARLA
      $mensaje = "mensaje especifico que puede cambiar dahab para las politicas";
      $servicio = Serv::find($id); //encontramos el registro
      $compañia = $servicio->compañia;
      $id = $servicio->id;
      $date = $servicio->created_at;
      $nombrecliente = $servicio->nombrecliente;
      $fechaentrega = $servicio->fechaentrega;
      $fecharecepcion = $servicio->created_at;
      $marca = $servicio->marca;
      $modelo = $servicio->modelo;
      $tipo = $servicio->tipo;
      $ns = $servicio->serie;
      $imei = $servicio->imei;
      $color = $servicio->color;
      $problemacliente = $servicio->problemacliente;
      $diagnostico1 = $servicio->diagnostico1;
      $receptor = $servicio->receptor;
      $costo = $servicio->costo;
      $pago1 = $servicio->abono1;
      $pago2 = $servicio->abono2;
      $abonos = $pago1 + $pago2;
      $enciende = $servicio->enciende;//////////////
      $benciende = $servicio->benciende;
      $bvolumen = $servicio->bvolumen;
      $bvibrador = $servicio->bvibrador;
      $pantalla =$servicio->pantalla;
      $touch = $servicio->touch;
      $display = $servicio->display;
      $ctrasera = $servicio->ctrasera;
      $cfrontal = $servicio->cfrontal;
      $ccarga = $servicio->ccarga;
      $altavoz = $servicio->altavoz;
      $microfono = $servicio->microfono;
      $auricular = $servicio->auricular;
      $boexterna = $servicio->boexterna;
      $jack = $servicio->jack;
      $wifi = $servicio->wifi;
      $bluetooth = $servicio->bluetooth;
      $datosm = $servicio->datosm;
      $bateria = $servicio->bateria;
      $portasim = $servicio->portasim;
      $sim = $servicio->sim;
      $bhome = $servicio->bhome;
      $touchid = $servicio->touchid;
      $sensorp = $servicio->sensorp;
      $carcasa = $servicio->carcasa;
      $teclado = $servicio->teclado;
      $señal = $servicio->señal;
      //$garantia = $servicio->garantia->garantia;
      $garantia = $servicio -> garantia;
      $gar = Garantia::find($garantia);
      $gar2 = $gar->garantia;
      //CREAREMOS UN NUMERO CONSECUTIVO PARA CADA NOTA NUEVA QUE SE IMPRIMA-> AUNQUE SE GUARDA LA VENTA EL NUMERO
      //SE INCREMENTA SIEMPRE POR CUESTIONES CONTABLES.
      Notas::create([
        'venta'=>$servicio->id, // guardamos el id de la ventas
        //LA FECHA DE LA EMISION DE LA NOTA SE GUARDA EN created_at
        ]);
        $idN  = Notas::where('venta',$id)->get()->last();
        $idN2 = $idN->id;

      $telefono = $servicio->telefono;
      $view =  \View::make('pdf.invoice0', compact('idN2','id','nombrecliente','fechaentrega','fecharecepcion','marca','modelo','tipo','ns','imei','color','problemacliente','diagnostico1','receptor','costo','receptor','abonos',
      'enciende','benciende','bvolumen','bvolumen','bvibrador','pantalla','touch','display','ctrasera','cfrontal','ccarga',
      'altavoz','microfono','auricular','boexterna','jack','wifi','bluetooth','datosm','bateria','portasim','sim','bhome',
      'touchid','sensorp','carcasa','teclado','señal','compañia','date','garantia','pago1','pago2','telefono','gar2'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->setPaper('A3', 'portrait');

      //return $idN2;
      $pdf->loadHTML($view);
      return $pdf->stream("Orden ".$id."__".$date);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mensaje = "mensaje especifico que puede cambiar dahab para las politicas";
        $servicio = Serv::find($id); //encontramos el registro
        $compañia = $servicio->compañia;
        $id = $servicio->id;
        $date = $servicio->created_at;
        $nombrecliente = $servicio->nombrecliente;
        $fechaentrega = $servicio->fechaentrega;
        $fecharecepcion = $servicio->created_at;
        $marca = $servicio->marca;
        $modelo = $servicio->modelo;
        $tipo = $servicio->tipo;
        $ns = $servicio->serie;
        $imei = $servicio->imei;
        $color = $servicio->color;
        $problemacliente = $servicio->problemacliente;
        $diagnostico1 = $servicio->diagnostico1;
        $receptor = $servicio->receptor;
        $costo = $servicio->costo;
        $pago1 = $servicio->abono1;
        $pago2 = $servicio->abono2;
        $abonos = $pago1 + $pago2;
        $enciende = $servicio->enciende;//////////////
        $benciende = $servicio->benciende;
        $bvolumen = $servicio->bvolumen;
        $bvibrador = $servicio->bvibrador;
        $pantalla =$servicio->pantalla;
        $touch = $servicio->touch;
        $display = $servicio->display;
        $ctrasera = $servicio->ctrasera;
        $cfrontal = $servicio->cfrontal;
        $ccarga = $servicio->ccarga;
        $altavoz = $servicio->altavoz;
        $microfono = $servicio->microfono;
        $auricular = $servicio->auricular;
        $boexterna = $servicio->boexterna;
        $jack = $servicio->jack;
        $wifi = $servicio->wifi;
        $bluetooth = $servicio->bluetooth;
        $datosm = $servicio->datosm;
        $bateria = $servicio->bateria;
        $portasim = $servicio->portasim;
        $sim = $servicio->sim;
        $bhome = $servicio->bhome;
        $touchid = $servicio->touchid;
        $sensorp = $servicio->sensorp;
        $carcasa = $servicio->carcasa;
        $teclado = $servicio->teclado;
        $señal = $servicio->señal;
        $view =  \View::make('pdf.invoice', compact('id','nombrecliente','fechaentrega','fecharecepcion','marca','modelo','tipo','ns','imei','color','problemacliente','diagnostico1','receptor','costo','receptor','abonos',
        'enciende','benciende','bvolumen','bvolumen','bvibrador','pantalla','touch','display','ctrasera','cfrontal','ccarga',
        'altavoz','microfono','auricular','boexterna','jack','wifi','bluetooth','datosm','bateria','portasim','sim','bhome',
        'touchid','sensorp','carcasa','teclado','señal','compañia'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('Legal', 'portrait');


        $pdf->loadHTML($view);
        return $pdf->download("Orden ".$id."__".$date);
        /*
     public function invoice()
    {
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('pdf.invoice', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download('invoice');

    }

    public function getData()
    {
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
    }

        */

       // return redirect('/pdf')->with('x', $x);;

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
