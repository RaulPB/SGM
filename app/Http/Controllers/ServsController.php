<?php

namespace Ifiix\Http\Controllers;

use Illuminate\Http\Request;
use Ifiix\Http\Requests;
use Ifiix\Http\Controllers\Controller;
use Mail;
use Input; //MODELO QUE NOS PERMITIO CAPTURAR UN INPUT Y MANIPULARLO
use Ifiix\Serv;
use Ifiix\Status;
use Ifiix\User;
use Ifiix\Garantia;
use Ifiix\Clientes;
use Ifiix\Sucursal;
use Ifiix\Tpago;
use Ifiix\Mensaje;
use Ifiix\DetalleVenta;
use DB;
use Carbon\Carbon;
use Ifiix\Http\Requests\ServicioCreate;
use Ifiix\Http\Requests\ServicioUpdate;
use Session;
use Redirect;
use Illuminate\Routing\Route;
use Illuminate\Database\Query\Builder;
class ServsController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function __construct(){

  }

  public function index(Request $request)
  {
    //dd($request->get('imei'));//PARA VALIDAR HASTA QUE PUNTO TODO VA FUNCIONANDO EN EL PASO DE DATOS
    $servicio = Serv::id($request->get('id'))->orderBy('created_at', 'asc')->paginate(1000);//->orderBy('created_at', 'asc');
    //$correo = Serv::where('status','<>', 'Entregado al cliente')->orderBy('fecha_recep', 'asc')->get();
    return view('servicio.indexserv',compact('servicio'));
  }
  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $idprov= Mensaje::find(1);
    $dire=$idprov->mensaje;
    //vamos a mandar el listado de articulos del inventario para la busqueda
    $articulos = DB::table('productos')->where('cantidad', '>', 0)->get();
    $cli = DB::table('clientes')->get();
    $garantia = DB::table('garantias')->lists('garantia', 'id');
    $status = Status::lists('status', 'id');
    $user = User::where('perfil_id', 3)->lists('name', 'id'); //regresamos solo los tecnicos.
    $pagor = Tpago::lists('pago', 'id');
    //$employees = Employee::where('branch_id', 9)->get()->lists('full_name', 'id');
    return view('servicio.create',compact('status','user','pagor','dire','articulos','cli','garantia'));//variables a las que asigne campos reales de la base de datos
    //return ($user);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response    ''=>$request[''],
  */
  public function store(ServicioCreate $request)
  {
    //creamos el servicio pero aun falta crear el detalle de venta
    $contactName = Input::get('status_id');

    $venta = new Serv;
    $venta->fechaingreso=$request->get('fechaingreso');
    $venta->comunicacion=$request->get('comunicacion');
    $venta->bitacoracontacto=$request->get('bitacoracontacto');
    $venta->nombrecliente=$request->get('nombrecliente');
    $venta->telefono=$request->get('telefono');
    $venta->celular=$request->get('celular');
    $venta->email=$request->get('email');
    $venta->producto=$request->get('producto');
    $venta->marca=$request->get('marca');
    $venta->modelo=$request->get('modelo');
    $venta->tipo=$request->get('tipo');
    $venta->color=$request->get('color');
    $venta->capacidad=$request->get('capacidad');
    $venta->serie=$request->get('serie');
    $venta->contraseña=$request->get('contraseña');
    $venta->compañia=$request->get('compañia');
    $venta->reparado=$request->get('reparado');
    $venta->agua=$request->get('agua');
    $venta->ingresoso=$request->get('ingresoso');
    $venta->enciende=$request->get('enciende');
    $venta->benciende=$request->get('benciende');
    $venta->bvolumen=$request->get('bvolumen');
    $venta->bvibrador=$request->get('bvibrador');
    $venta->pantalla=$request->get('pantalla');
    $venta->touch=$request->get('touch');
    $venta->display=$request->get('display');
    $venta->ctrasera=$request->get('ctrasera');
    $venta->ccarga=$request->get('ccarga');
    $venta->altavoz=$request->get('altavoz');
    $venta->microfono=$request->get('microfono');
    $venta->auricular=$request->get('auricular');
    $venta->boexterna=$request->get('boexterna');
    $venta->jack=$request->get('jack');
    $venta->wifi=$request->get('wifi');
    $venta->bluetooth=$request->get('bluetooth');
    $venta->datosm=$request->get('datosm');
    $venta->bateria=$request->get('bateria');
    $venta->portasim=$request->get('portasim');
    $venta->sim=$request->get('sim');
    $venta->imei=$request->get('imei');
    $venta->bhome=$request->get('bhome');
    $venta->touchid=$request->get('touchid');
    $venta->sensorp=$request->get('sensorp');
    $venta->carcasa=$request->get('carcasa');
    $venta->teclado=$request->get('teclado');
    $venta->señal=$request->get('señal');
    $venta->problemacliente=$request->get('problemacliente');
    $venta->solucion1=$request->get('solucion1');
    $venta->diagnostico1=$request->get('diagnostico1');
    $venta->diagnostico2=$request->get('diagnostico2');
    $venta->fechaentrega=$request->get('fechaentrega');
    if($contactName == 6 || $contactName == 21 || $contactName == 22){
      $hoy = \Carbon\Carbon::now();
      $venta->fechanotifica= $hoy;
    }
    //$venta->fechanotifica=$request->get('fechanotifica');
    $venta->fechapago1=$request->get('fechapago1');
    $venta->fechapago2=$request->get('fechapago2');
    $venta->fechapago3=$request->get('fechapago3');
    $venta->fechapago4=$request->get('fechapago4');
    $venta->fechapago5=$request->get('fechapago5');
    $venta->costo=$request->get('total_venta2'); //ANTES ERA costo
    $venta->costoajustado=$request->get('costoajustado');
    $venta->razon=$request->get('razon');
    $venta->status_id=$request->get('status_id');
    $venta->tecnico_id=$request->get('tecnico_id');
    $venta->receptor=$request->get('receptor');
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
    $venta->save();

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
    //////////////

    $idarticulo = $request->get('idarticulo');
    $cantidad = $request->get('cantidad');
    $precio_pub = $request->get('precio_venta');

    $cont = 0;
    while ( $cont < count($idarticulo) ) {
      $detalle = new DetalleVenta();
      $detalle->idventa=$venta->id; //le asignamos el id de la venta a la que pertenece el detalle
      $detalle->idarticulo=$idarticulo[$cont];
      $detalle->cantidad=$cantidad[$cont];
      $detalle->precio_pub=$precio_pub[$cont];
      $detalle->save();
      $cont = $cont+1;
    }
    //return Redirect::to('/servicio');
    return redirect('/encuesta/create')->with('message','Información almacenada');

  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show(Request $request) //METODO PARA PODER MOSTRAR LOS SERVICIOS QUE SE TERMINARON
  {
    //$servicio = Serv::where('status_id', '=', 10)->paginate(10);
    $servicio = Serv::ids($request->get('imei'))->paginate(10);
    return view('servicio.indexservt',compact('servicio'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $articulos = DB::table('productos')->where('cantidad', '>', 0)->get();
    $cli = DB::table('clientes')->get();
    $servicio = Serv::find($id);
    $status = Status::where('status','<>',15)->where('status','<>',1)->lists('status', 'id');
    $user = User::where('perfil_id', 3)->lists('name', 'id');
    $sucursal = Sucursal::lists('nameS','id');
    $garantia = Garantia::lists('garantia','id');
    $pagor = Tpago::lists('pago', 'id');

    //$articulos = DB::table('productos')->where('cantidad', '>', 0)->get();
    $detalles = DB::table('detalle_venta as d')
    ->join('productos as a','d.idarticulo','=','a.id')
    ->select('a.modelo as articulo','d.cantidad','d.precio_pub')
    ->where('d.idventa','=', $id)
    ->get();
    //return view('servicio.editserv',['servicio'=>$servicio],compact('status','user','garantia','pagor','articulos','cli','detalle'));
    return view('servicio.editserv',["servicio" => $servicio,"status" => $status, "user" => $user, "garantia" => $garantia, "pagor" => $pagor, "articulos" => $articulos, "cli" => $cli, "detalles" => $detalles, "sucursal" => $sucursal]);
    //return ($detalles);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(ServicioUpdate $request, $id)
  {
    $contactName = Input::get('status_id');
    $contactEmail = Input::get('email');
    $contactId = $id;//Input::get('id');
    $nombrecliente = Input::get('nombrecliente');


    if ($contactName == 6){//SI STATUS = REPARADO
      if ($contactEmail <> ""){
        $data = array('name'=>$contactName, 'email'=>$contactEmail, 'id'=>$contactId,'nombrecliente'=>$nombrecliente);
        Mail::send('emails.contact',$data,function($msj)use ($contactEmail, $contactName, $contactId, $nombrecliente){
          $msj->subject('Ifiix: Orden de servicio lista para ser entregada'); //Motivo del correo
          $msj->to($contactEmail);
        });
      }
      $servicio = Serv::find($id);
      $servicio->fill($request->all());
      $servicio->status_id = 7;
      $hoy = \Carbon\Carbon::now();
      $hoy = $hoy->format('Y-m-d');
      $servicio->fechanotifica= $hoy;//GUARDAMOS LA FECHA DE NOTIFICACION
      $notificame = $servicio->bitacoracontacto;
      $servicio->bitacoracontacto = $notificame."Reparación:".$hoy."; ";
      $servicio->costo=$request->get('total_venta2');
      $servicio->save();

      $idarticulo = $request->get('idarticulo');
      $cantidad = $request->get('cantidad');
      $precio_pub = $request->get('precio_venta');

      $cont = 0;
      while ( $cont < count($idarticulo) ) {
        $detalle = new DetalleVenta();
        $detalle->idventa=$servicio->id; //le asignamos el id de la venta a la que pertenece el detalle
        $detalle->idarticulo=$idarticulo[$cont];
        $detalle->cantidad=$cantidad[$cont];
        $detalle->precio_pub=$precio_pub[$cont];
        $detalle->save();
        $cont = $cont+1;
      }

      Session::flash('message','Orden Actualizada');
      return Redirect::to('/servicio');
    }

    if ($contactName == 21){//SI STATUS = NO SE PUDO REVISAR
      if ($contactEmail <> ""){
        $data = array('name'=>$contactName, 'email'=>$contactEmail, 'id'=>$contactId,'nombrecliente'=>$nombrecliente);
        Mail::send('emails.contact',$data,function($msj)use ($contactEmail, $contactName, $contactId, $nombrecliente){
          $msj->subject('Ifiix: Orden de servicio NO se pudo REVISAR'); //Motivo del correo
          $msj->to($contactEmail);
        });
      }
      $servicio = Serv::find($id);
      $servicio->fill($request->all());
      $servicio->status_id = 7;
      $hoy = \Carbon\Carbon::now();
      $hoy = $hoy->format('Y-m-d');
      $servicio->fechanotifica= $hoy;//GUARDAMOS LA FECHA DE NOTIFICACION
      $notificame = $servicio->bitacoracontacto;
      $servicio->bitacoracontacto = $notificame."No se pudo revisar:".$hoy."; ";
      $servicio->producto = "NO SE PUDO REVISAR";
      $servicio->marca = "NO SE PUDO REVISAR";
      $servicio->modelo = "NO SE PUDO REVISAR";
      $servicio->tipo = "NO SE PUDO REVISAR";
      $servicio->color = "NO SE PUDO REVISAR";
      $servicio->capacidad = "NO SE PUDO REVISAR";
      $servicio->serie = "NO SE PUDO REVISAR";
      $servicio->imei = "NO SE PUDO REVISAR";
      $servicio->contraseña = "NO SE PUDO REVISAR";
      $servicio->compañia = "NO SE PUDO REVISAR";
      $servicio->reparado = "NO SE PUDO REVISAR";
      $servicio->agua = "NO SE PUDO REVISAR";
      $servicio->ingresoso = "NO SE PUDO REVISAR";
      $servicio->enciende = "NO SE PUDO REVISAR";
      $servicio->benciende = "NO SE PUDO REVISAR";
      $servicio->bvolumen = "NO SE PUDO REVISAR";
      $servicio->bvibrador = "NO SE PUDO REVISAR";
      $servicio->pantalla = "NO SE PUDO REVISAR";
      $servicio->touch = "NO SE PUDO REVISAR";
      $servicio->display = "NO SE PUDO REVISAR";
      $servicio->ctrasera = "NO SE PUDO REVISAR";
      $servicio->cfrontal = "NO SE PUDO REVISAR";
      $servicio->ccarga = "NO SE PUDO REVISAR";
      $servicio->altavoz = "NO SE PUDO REVISAR";
      $servicio->microfono = "NO SE PUDO REVISAR";
      $servicio->auricular = "NO SE PUDO REVISAR";
      $servicio->boexterna = "NO SE PUDO REVISAR";
      $servicio->jack = "NO SE PUDO REVISAR";
      $servicio->wifi = "NO SE PUDO REVISAR";
      $servicio->bluetooth = "NO SE PUDO REVISAR";
      $servicio->datosm = "NO SE PUDO REVISAR";
      $servicio->bateria = "NO SE PUDO REVISAR";
      $servicio->portasim = "NO SE PUDO REVISAR";
      $servicio->sim = "NO SE PUDO REVISAR";
      $servicio->bhome = "NO SE PUDO REVISAR";
      $servicio->touchid = "NO SE PUDO REVISAR";
      $servicio->sensorp = "NO SE PUDO REVISAR";
      $servicio->carcasa = "NO SE PUDO REVISAR";
      $servicio->teclado = "NO SE PUDO REVISAR";
      $servicio->señal = "NO SE PUDO REVISAR";
      $servicio->problemacliente = "NO SE PUDO REVISAR";
      $servicio->solucion1 = "NO SE PUDO REVISAR";
      $servicio->costo=$request->get('total_venta2');
      $servicio->save();
      $idarticulo = $request->get('idarticulo');
      $cantidad = $request->get('cantidad');
      $precio_pub = $request->get('precio_venta');

      $cont = 0;
      while ( $cont < count($idarticulo) ) {
        $detalle = new DetalleVenta();
        $detalle->idventa=$servicio->id; //le asignamos el id de la venta a la que pertenece el detalle
        $detalle->idarticulo=$idarticulo[$cont];
        $detalle->cantidad=$cantidad[$cont];
        $detalle->precio_pub=$precio_pub[$cont];
        $detalle->save();
        $cont = $cont+1;
      }


      Session::flash('message','Se notifico al cliente via correo electronico');
      return Redirect::to('/servicio');
    }

    if ($contactName == 22){//SI STATUS = NO SE PUDO REPARAR
      if ($contactEmail <> ""){
        $data = array('name'=>$contactName, 'email'=>$contactEmail, 'id'=>$contactId,'nombrecliente'=>$nombrecliente);
        Mail::send('emails.contact',$data,function($msj)use ($contactEmail, $contactName, $contactId, $nombrecliente){
          $msj->subject('Ifiix: Orden de servicio NO se pudo REPARAR'); //Motivo del correo
          $msj->to($contactEmail);
        });
      }
      $servicio = Serv::find($id);
      $servicio->fill($request->all());
      $servicio->status_id = 7;
      $hoy = \Carbon\Carbon::now();
      $hoy = $hoy->format('Y-m-d');
      $servicio->fechanotifica= $hoy;//GUARDAMOS LA FECHA DE NOTIFICACION
      $notificame = $servicio->bitacoracontacto;
      $servicio->bitacoracontacto = $notificame."No se pudo reparar:".$hoy."; ";
      $servicio->producto = "NO SE PUDO REPARAR";
      $servicio->marca = "NO SE PUDO REPARAR";
      $servicio->modelo = "NO SE PUDO REPARAR";
      $servicio->tipo = "NO SE PUDO REPARAR";
      $servicio->color = "NO SE PUDO REPARAR";
      $servicio->capacidad = "NO SE PUDO REPARAR";
      $servicio->serie = "NO SE PUDO REPARAR";
      $servicio->imei = "NO SE PUDO REPARAR";
      $servicio->contraseña = "NO SE PUDO REPARAR";
      $servicio->compañia = "NO SE PUDO REPARAR";
      $servicio->reparado = "NO SE PUDO REPARAR";
      $servicio->agua = "NO SE PUDO REPARAR";
      $servicio->ingresoso = "NO SE PUDO REPARAR";
      $servicio->enciende = "NO SE PUDO REPARAR";
      $servicio->benciende = "NO SE PUDO REPARAR";
      $servicio->bvolumen = "NO SE PUDO REPARAR";
      $servicio->bvibrador = "NO SE PUDO REPARAR";
      $servicio->pantalla = "NO SE PUDO REPARAR";
      $servicio->touch = "NO SE PUDO REPARAR";
      $servicio->display = "NO SE PUDO REPARAR";
      $servicio->ctrasera = "NO SE PUDO REPARAR";
      $servicio->cfrontal = "NO SE PUDO REPARAR";
      $servicio->ccarga = "NO SE PUDO REPARAR";
      $servicio->altavoz = "NO SE PUDO REPARAR";
      $servicio->microfono = "NO SE PUDO REPARAR";
      $servicio->auricular = "NO SE PUDO REPARAR";
      $servicio->boexterna = "NO SE PUDO REPARAR";
      $servicio->jack = "NO SE PUDO REPARAR";
      $servicio->wifi = "NO SE PUDO REPARAR";
      $servicio->bluetooth = "NO SE PUDO REPARAR";
      $servicio->datosm = "NO SE PUDO REPARAR";
      $servicio->bateria = "NO SE PUDO REPARAR";
      $servicio->portasim = "NO SE PUDO REPARAR";
      $servicio->sim = "NO SE PUDO REPARAR";
      $servicio->bhome = "NO SE PUDO REPARAR";
      $servicio->touchid = "NO SE PUDO REPARAR";
      $servicio->sensorp = "NO SE PUDO REPARAR";
      $servicio->carcasa = "NO SE PUDO REPARAR";
      $servicio->teclado = "NO SE PUDO REPARAR";
      $servicio->señal = "NO SE PUDO REPARAR";
      $servicio->problemacliente = "NO SE PUDO REPARAR";
      $servicio->solucion1 = "NO SE PUDO REPARAR";
      $servicio->costo=$request->get('total_venta2');
      $servicio->save();
      $idarticulo = $request->get('idarticulo');
      $cantidad = $request->get('cantidad');
      $precio_pub = $request->get('precio_venta');

      $cont = 0;
      while ( $cont < count($idarticulo) ) {
        $detalle = new DetalleVenta();
        $detalle->idventa=$servicio->id; //le asignamos el id de la venta a la que pertenece el detalle
        $detalle->idarticulo=$idarticulo[$cont];
        $detalle->cantidad=$cantidad[$cont];
        $detalle->precio_pub=$precio_pub[$cont];
        $detalle->save();
        $cont = $cont+1;
      }
      Session::flash('message','Se notifico al cliente via correo electronico');
      return Redirect::to('/servicio');
    }

    $resta = Input::get('resta');//PARA SABER SI EL CAMPO ESTA EN BLANCO
    $status = Input::get('status_id');//$status == 10 o ENTREGADO A CLIENTE

    if($contactName == '10' and $resta != '0'){  //STATUS: ENTREGADO A CLIENTE EN SUCURSAL
      //if($status == 10){
      Session::flash('message','AUN RESTA SALDO POR LIQUIDAR');
      return Redirect::to('/servicio');
      //}
    }else{

      $servicio = Serv::find($id);
      $servicio->fill($request->all());
      $servicio->costo=$request->get('total_venta2');
      $servicio->save();
      $idarticulo = $request->get('idarticulo');
      $cantidad = $request->get('cantidad');
      $precio_pub = $request->get('precio_venta');

      $cont = 0;
      while ( $cont < count($idarticulo) ) {
        $detalle = new DetalleVenta();
        $detalle->idventa=$servicio->id; //le asignamos el id de la venta a la que pertenece el detalle
        $detalle->idarticulo=$idarticulo[$cont];
        $detalle->cantidad=$cantidad[$cont];
        $detalle->precio_pub=$precio_pub[$cont];
        $detalle->save();
        $cont = $cont+1;
      }


      Session::flash('message','Orden actualizada correctamente');
      return Redirect::to('/servicio');
    }


    if($contactName <> 6){
      $servicio = Serv::find($id);
      $servicio->fill($request->all());
      $servicio->costo=$request->get('total_venta2');
      $servicio->fechanotifica="";//fecha de notitificacion vacia si NO esta reparado o status 21 ó 22
      $servicio->save();
      $idarticulo = $request->get('idarticulo');
      $cantidad = $request->get('cantidad');
      $precio_pub = $request->get('precio_venta');

      $cont = 0;
      while ( $cont < count($idarticulo) ) {
        $detalle = new DetalleVenta();
        $detalle->idventa=$servicio->id; //le asignamos el id de la venta a la que pertenece el detalle
        $detalle->idarticulo=$idarticulo[$cont];
        $detalle->cantidad=$cantidad[$cont];
        $detalle->precio_pub=$precio_pub[$cont];
        $detalle->save();
        $cont = $cont+1;
      }


      Session::flash('message','Orden actualizada correctamente');
      return Redirect::to('/servicio');
    }
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id) //Metodo adaptado para que se visualicen las ordenes canceladas
  {
    return('/pdf');
  }
}
