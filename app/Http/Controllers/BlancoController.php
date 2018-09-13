<?php

namespace SGM\Http\Controllers;

use Illuminate\Http\Request;

use SGM\Http\Requests;
use SGM\Http\Controllers\Controller;
use SGM\Serv;
use DB;
use Auth;
use SGM\Sucursal;
use SGM\Notas;
use SGM\Tpago;
use SGM\Clientes;
use SGM\Garantia;

class BlancoController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $cli = DB::table('clientes')->get();
    $garantias = DB::table('garantias')->get();
    $pagor = Tpago::lists('pago', 'id');
    //$employees = Employee::where('branch_id', 9)->get()->lists('full_name', 'id');
    return view('notas.create',compact('pagor','cli','garantias'));//variables a las que asigne campos reales de la base de datos
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //GENERAMOS LA VENTA $servicio
    $venta = new Serv;
    $venta->fechaingreso=$request->get('fechaingreso');
    $venta->comunicacion=$request->get('comunicacion');
    $venta->nombrecliente=$request->get('nombrecliente');
    $venta->telefono=$request->get('telefono');
    $venta->celular=$request->get('celular');
    $venta->email=$request->get('email');
    $venta->diagnostico2=$request->get('diagnostico2');
    $venta->fechaentrega=$request->get('fechaentrega');
    $venta->fechapago1=$request->get('fechapago1');
    $venta->fechapago2=$request->get('fechapago2');
    $venta->fechapago3=$request->get('fechapago3');
    $venta->fechapago4=$request->get('fechapago4');
    $venta->fechapago5=$request->get('fechapago5');
    $venta->status_id='10';
    $venta->garantia=$request->get('pidarticulo');/////
    $venta->receptor=$request->get('receptor');
    $venta->costo = $request->get('total_venta2');
    $venta->fechaentrega=$request->get('fechaentrega');
    $venta->tipopago1=$request->get('tipopago1');
    $venta->tipopago2=$request->get('tipopago2');
    $venta->tipopago3=$request->get('tipopago3');
    $venta->tipopago4=$request->get('tipopago4');
    $venta->tipopago5=$request->get('tipopago5');
    $venta->abono1=$request->get('abono1');
    $venta->abono2=$request->get('abono2');
    $venta->abono3=$request->get('abono3');
    $venta->abono4=$request->get('abono4');
    $venta->abono5=$request->get('abono5');
    //GENERAMOS EL TOTAL EN LETRA
    $letras = \NumeroALetras::convertir($venta->costo);
    $receptor = $venta->receptor; //recuperamos el nombre del receptor
    //EXTRAEREMOS LA SUCURSAL DEL RECEPTOR PARA PODER AGREGAR LAS SIGLAS A LA NOTA
    $idsucur = DB::table('users')->where('name', '=', $receptor)->pluck('sucursal_id');// sacamos el id de la sucursal
    $claven = DB::table('sucursals')->where('id', '=', $idsucur)->pluck('clavenota');
    $cont = DB::table('sucursals')->where('id', '=', $idsucur)->pluck('contador');
    $cont = $cont + 1; //sumamos 1 al contador
    $suci = Sucursal::find($idsucur);//ubicamos la sucursal
    $suci->contador=$cont;//sumamos al contador correpondiente
    $nombre = $claven . $cont;
    $suci->save();//guardamos el nuevo contador en la sucursal
    //SACAMOS EL ID DEL RECEPTOR PARA ASIGNARLO COMO tecnico
    $tecid = DB::table('users')->where('name', '=', $receptor)->pluck('id');
    $venta->tecnico_id = $tecid;
    //PROCESO PARA SACAR EL NOMBRE DE LA SUCURSAL PARA LA NOTA
    $sucis = Sucursal::find($idsucur);//ubicamos la sucursal por el id
    $venta->sucursal=$sucis->id;//sacamos el nombre de la sucursal
    $venta->save(); //GUARDAMOS LA ORDEN DE SERVICIO
    //VAMOS A CREAR EL LISTADO DE CLIENTES DIRECTAMENTE DESDE LA ORDEN DE SERVICIO SI ES QUE NO LO ENCUENTRA EN LA TABLA DE CLIENTES. ESO ESPERO xD
    $clie=$request->get('nombrecliente');
    $prod  = Clientes::where('cliente',$clie)->get()->first();

    if($prod == NULL){
      $cli = new Clientes;
      $cli->cliente=$request->get('nombrecliente');
      $cli->correo=$request->get('email');
      $cli->telefono=$request->get('telefono');
      $cli->celular=$request->get('celular');
      $cli->save();
    }
    //GENERAMOS LA NOTA DE VENTA
    $nota = new Notas;
    $nota->venta=$venta->id;
    $nota->abono1=$venta->abono1;
    $nota->abono2=$venta->abono2;
    $nota->abono3=$venta->abono3;
    $nota->abono4=$venta->abono4;
    $nota->abono5= $venta->abono5;
    $nota->detalle=$venta->diagnostico2;
    $nota->nota=$nombre;
    $nota->tipo='blc';
    $nota->save();
    $notid=$nota->id; //extraigo el id de la nota recien creada.
    $ordens = $venta->id;

    //EXTRAEREMOS LA SUCURSAL DEL RECEPTOR PARA PODER AGREGAR LAS SIGLAS A LA NOTA
    return redirect('/reimpn')->with('message','Orden '.$ordens.' registrada correctamente, nota de venta lista para impresión');

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
