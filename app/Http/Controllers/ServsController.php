<?php

namespace SGM\Http\Controllers;

use Illuminate\Http\Request;
use SGM\Http\Requests;
use SGM\Http\Controllers\Controller;
use Mail;
use Input; //MODELO QUE NOS PERMITIO CAPTURAR UN INPUT Y MANIPULARLO
use SGM\Serv;
use SGM\Status;
use SGM\User;
use SGM\Garantia;
use SGM\Clientes;
use SGM\Sucursal;
use SGM\Tpago;
use SGM\Mensaje;
use SGM\DetalleVenta;
use SGM\Producto;
use DB;
use Carbon\Carbon;
use SGM\Http\Requests\ServicioCreate;
use SGM\Http\Requests\ServicioUpdate;
use Session;
use Redirect;
use Illuminate\Routing\Route;
use Illuminate\Database\Query\Builder;
use SGM\Politica;
use Auth;
 use Cookie;

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
    $servicio = Serv::id($request->get('id'))->orderBy('created_at', 'asc')->paginate(5);//->orderBy('created_at', 'asc');
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
    //$articulos = DB::table('productos')->where('cantidad', '>', 0)->get();
    $idlogueado = Auth::user()->sucursal_id; //extraemos id del usuario logueado.
    $articulos = Producto::where('sucursal_id',"=", $idlogueado)->where("status", "=", "Activo")->get();

    $cli = DB::table('clientes')->get();
    $garantia = DB::table('garantias')->lists('garantia', 'id');
    $status = Status::lists('status', 'id');
    $idlogueado = Auth::user()->sucursal_id; //extraemos id del usuario logueado.
    $user = User::where('perfil_id', 3)->Where('sucursal_id',"=", $idlogueado)->lists('name', 'id'); //regresamos solo los tecnicos.
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
    $detector = Input::get('equipoareparar');
   

//PREGUNTAMOS QUE TIPO DE EQUIPO ES ????
    
  if ($detector == "MACBOOK-PC"){
    $datox=$request->get('marca');
    return ("queremos guardar todo lo de PC WE".$datox);
  }

    if ($detector == "IPAD-TABLET"){
    return ("queremos guardar todo lo de IPAD-TABLET");
  }

  if ($detector == "MOVIL"){
    if ($contactName  == 21){
      //return("ENTRAMOS A NO SE PUDO REVISAR");
      $venta = new Serv;
      $venta->nombrecliente=$request->get('nombrecliente');
      $venta->telefono=$request->get('telefono');
      $venta->celular=$request->get('celular');
      $venta->email=$request->get('email');
      $venta->fechaingreso=$request->get('fechaingreso');
      $venta->comunicacion=$request->get('comunicacion');
      $venta->bitacoracontacto="NO SE PUDO REVISAR";
      $venta->producto=$request->get('producto');
      $venta->marca=$request->get('marca');
      $venta->modelo=$request->get('modelo');
      $venta->tipo="NO SE PUDO REVISAR";
      $venta->color="NO SE PUDO REVISAR";
      $venta->capacidad="NO SE PUDO REVISAR";
      $venta->serie="NO SE PUDO REVISAR";
      $venta->contraseña="NO SE PUDO REVISAR";
      $venta->compañia="NO SE PUDO REVISAR";
      $venta->reparado="NO SE PUDO REVISAR";
      $venta->agua="NO SE PUDO REVISAR";
      $venta->ingresoso="NO SE PUDO REVISAR";
      $venta->enciende="NO SE PUDO REVISAR";
      $venta->benciende="NO SE PUDO REVISAR";
      $venta->bvolumen="NO SE PUDO REVISAR";
      $venta->bvibrador="NO SE PUDO REVISAR";
      $venta->pantalla="NO SE PUDO REVISAR";
      $venta->touch="NO SE PUDO REVISAR";
      $venta->display="NO SE PUDO REVISAR";
      $venta->ctrasera="NO SE PUDO REVISAR";
      $venta->ccarga="NO SE PUDO REVISAR";
      $venta->altavoz="NO SE PUDO REVISAR";
      $venta->microfono="NO SE PUDO REVISAR";
      $venta->auricular="NO SE PUDO REVISAR";
      $venta->boexterna="NO SE PUDO REVISAR";
      $venta->jack="NO SE PUDO REVISAR";
      $venta->wifi="NO SE PUDO REVISAR";
      $venta->bluetooth="NO SE PUDO REVISAR";
      $venta->datosm="NO SE PUDO REVISAR";
      $venta->bateria="NO SE PUDO REVISAR";
      $venta->portasim="NO SE PUDO REVISAR";
      $venta->sim="NO SE PUDO REVISAR";
      $venta->imei="NO SE PUDO REVISAR";
      $venta->bhome="NO SE PUDO REVISAR";
      $venta->touchid="NO SE PUDO REVISAR";
      $venta->sensorp="NO SE PUDO REVISAR";
      $venta->carcasa="NO SE PUDO REVISAR";
      $venta->teclado="NO SE PUDO REVISAR";
      $venta->señal="NO SE PUDO REVISAR";
      $venta->problemacliente=$request->get('problemacliente');
      $venta->solucion1=$request->get('solucion1');
      $venta->diagnostico1=$request->get('diagnostico1');
      $venta->diagnostico2=$request->get('diagnostico2');
      $venta->fechaentrega=$request->get('fechaentrega');
      $venta->flash="NO SE PUDO REVISAR";
    }

    if($contactName  != 21){
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
    $venta->cfrontal=$request->get('cfrontal');
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
    $venta->flash=$request->get('flash');
  }

    if($contactName == 6 || $contactName == 21 || $contactName == 22){ //REPARADO-NO SE PUDO REVISAR-NO SE PUDO REPARAR
      $hoy = \Carbon\Carbon::now();
      $venta->fechanotifica= $hoy;
    }
   //RECUPERAMOS LOS CAMPOS DE ABONO PARA SABER SI SON DISTINTOS A 0 GUARDAR LAS FECHAS.

    $abono1s=$request->get('abono1');
    $abono2s=$request->get('abono2');
    $abono3s=$request->get('abono3');
    $abono4s=$request->get('abono4');
    $abono5s=$request->get('abono5');

    if($abono1s != "0"){ //0000-00-00 00:00:00
      $venta->fechapago1= \Carbon\Carbon::now();
      $venta->abono1= $abono1s;
    }else{
      $venta->abono1= 0;
      $venta->fechapago1= "0000-00-00 00:00:00";
    }
    
    if($abono2s != "0"){
      $venta->fechapago2= \Carbon\Carbon::now();
      $venta->abono2= $abono2s;
    }else{
      $venta->abono2= 0;
      $venta->fechapago2= "0000-00-00 00:00:00";
    }

    if($abono3s != "0"){
      $venta->fechapago3= \Carbon\Carbon::now();
      $venta->abono3= $abono3s;
    }else{
      $venta->abono3= 0;
      $venta->fechapago3= "0000-00-00 00:00:00";
    }

    if($abono4s != "0"){
      $venta->fechapago4= \Carbon\Carbon::now();
      $venta->abono4= $abono4s;
    }else{
      $venta->abono4= 0;
      $venta->fechapago4= "0000-00-00 00:00:00";
    }

    if($abono5s != "0"){
      $venta->fechapago5= \Carbon\Carbon::now();
      $venta->abono5= $abono5s;
    }else{
      $venta->abono5= 0;
      $venta->fechapago5= "0000-00-00 00:00:00";
    }
    
    $venta->costo=$request->get('total_venta2'); //ANTES ERA costo
    $venta->costoajustado=$request->get('costoajustado');
    $venta->razon=$request->get('razon');
    $venta->status_id=$request->get('status_id');
    $venta->tecnico_id=$request->get('tecnico_id');
    $venta->receptor=$request->get('receptor');
    $recp = $request->get('receptor');
    $idsucur = DB::table('users')->where('name', '=', $recp)->pluck('sucursal_id');
    $venta->sucursal = $idsucur;
    $venta->fechaentrega=$request->get('fechaentrega');
    $venta->tipopago1=$request->get('tipopago1');
    $venta->tipopago2=$request->get('tipopago2');
    $venta->tipopago3=$request->get('tipopago3');
    $venta->tipopago4=$request->get('tipopago4');
    $venta->tipopago5=$request->get('tipopago5');
    
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
    $ordens = $venta->id;

    Cookie::queue('Orden', $ordens, 60);
    return redirect('encuesta/create');
}

if($detector == "")
   Session::flash('msg1','La orden no puede generarse vacia; reintente');
 
      return Redirect::to('/servicio/create/');
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
    $servicio = Serv::ids($request->get('id'))->paginate(10);
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
    //$articulos = DB::table('productos')->where('cantidad', '>', 0)->get();
    $idlogueado = Auth::user()->sucursal_id; //extraemos id del usuario logueado.
    $articulos = Producto::where('sucursal_id',"=", $idlogueado)->where("status", "=", "Activo")->get();
    $cli = DB::table('clientes')->get();
    $servicio = Serv::find($id);
    $email = $servicio->email;
    $id = $servicio->id;
    $status = Status::where('status','<>',15)->where('status','<>',1)->lists('status', 'id');
    $idlogueado = Auth::user()->sucursal_id; //extraemos id del usuario logueado.
    $user = User::where('perfil_id', 3)->Where('sucursal_id',"=", $idlogueado)->lists('name', 'id'); //regresamos solo los tecnicos.
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
    return view('servicio.editserv',["servicio" => $servicio,"status" => $status, "user" => $user, "garantia" => $garantia, "pagor" => $pagor, "articulos" => $articulos, "cli" => $cli, "detalles" => $detalles, "email" => $email, "id" => $id]);
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

        if ($contactName == 19){
       $servicio = Serv::find($id);
      //extraemos la fecha de ingreso para que no se modifique y pueda ser tomada por el reporte de ventas.
      $fechaingreso1 = $servicio->fechaingreso;
    
      $servicio->fill($request->all()); //recuperamos todo de la vista

        //VAMOS A RECUPERAR LAS FECHAS Y ABONOS PARA EVALUAR SI ESTAN NULOS Y SI ES ASÍ PODER ACTUALIZAR SOLO ESTOS
      $fabono1s=$request->get('fechapago1');
      $fabono2s=$request->get('fechapago2');
      $fabono3s=$request->get('fechapago3');
      $fabono4s=$request->get('fechapago4');
      $fabono5s=$request->get('fechapago5');

      $Abono1ss=$request->get('abono1');
      $Abono2ss=$request->get('abono2');
      $Abono3ss=$request->get('abono3');
      $Abono4ss=$request->get('abono4');
      $Abono5ss=$request->get('abono5');

    if($fabono1s == "0000-00-00 00:00:00" && $Abono1ss != 0){
      $servicio->fechapago1= \Carbon\Carbon::now();
      $servicio->abono1= $Abono1ss;
    }

    if($fabono2s == "0000-00-00 00:00:00" && $Abono2ss != 0){
      $servicio->fechapago2= \Carbon\Carbon::now();
      $servicio->abono2= $Abono2ss;
    }

    if($fabono3s == "0000-00-00 00:00:00" && $Abono3ss != 0){
      $servicio->fechapago3= \Carbon\Carbon::now();
      $servicio->abono3= $Abono3ss;
    }

     if($fabono4s == "0000-00-00 00:00:00" && $Abono4ss != 0){
      $servicio->fechapago4= \Carbon\Carbon::now();
      $servicio->abono4= $Abono4ss;
    }

    if($fabono5s == "0000-00-00 00:00:00" && $Abono5ss != 0){
      $servicio->fechapago5= \Carbon\Carbon::now();
      $servicio->abono5= $Abono5ss;
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////


      $servicio->fechaingreso = $fechaingreso1;
      $servicio->status_id = 19;//cliente notificado en espera de recoleccion via correo
      $hoy = \Carbon\Carbon::now();
      //$hoy = $hoy->format('Y-m-d');
      $notificame = $servicio->bitacoracontacto;
      $servicio->bitacoracontacto = $notificame." Cliente no localizado, llamada: ".$hoy."; ";
      $servicio->save();
      $ordens = $servicio->id;
      Session::flash('msg','intento de contacto con cliente registrado en bitacora para orden: '.$ordens.'');
      return Redirect::to('/servicio');
    }

    if ($contactName == 7){//SI Cliente notificado/En espera de recolección de cliente
      $servicio = Serv::find($id);
      //extraemos la fecha de ingreso para que no se modifique y pueda ser tomada por el reporte de ventas.
      $fechaingreso1 = $servicio->fechaingreso;
    
      $servicio->fill($request->all()); //recuperamos todo de la vista

        //VAMOS A RECUPERAR LAS FECHAS Y ABONOS PARA EVALUAR SI ESTAN NULOS Y SI ES ASÍ PODER ACTUALIZAR SOLO ESTOS
      $fabono1s=$request->get('fechapago1');
      $fabono2s=$request->get('fechapago2');
      $fabono3s=$request->get('fechapago3');
      $fabono4s=$request->get('fechapago4');
      $fabono5s=$request->get('fechapago5');

      $Abono1ss=$request->get('abono1');
      $Abono2ss=$request->get('abono2');
      $Abono3ss=$request->get('abono3');
      $Abono4ss=$request->get('abono4');
      $Abono5ss=$request->get('abono5');

    if($fabono1s == "0000-00-00 00:00:00" && $Abono1ss != 0){
      $servicio->fechapago1= \Carbon\Carbon::now();
      $servicio->abono1= $Abono1ss;
    }

    if($fabono2s == "0000-00-00 00:00:00" && $Abono2ss != 0){
      $servicio->fechapago2= \Carbon\Carbon::now();
      $servicio->abono2= $Abono2ss;
    }

    if($fabono3s == "0000-00-00 00:00:00" && $Abono3ss != 0){
      $servicio->fechapago3= \Carbon\Carbon::now();
      $servicio->abono3= $Abono3ss;
    }

     if($fabono4s == "0000-00-00 00:00:00" && $Abono4ss != 0){
      $servicio->fechapago4= \Carbon\Carbon::now();
      $servicio->abono4= $Abono4ss;
    }

    if($fabono5s == "0000-00-00 00:00:00" && $Abono5ss != 0){
      $servicio->fechapago5= \Carbon\Carbon::now();
      $servicio->abono5= $Abono5ss;
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////


      $servicio->fechaingreso = $fechaingreso1;
      $servicio->status_id = 7;//cliente notificado en espera de recoleccion via correo
      $hoy = \Carbon\Carbon::now();
      //$hoy = $hoy->format('Y-m-d');
      $notificame = $servicio->bitacoracontacto;
      $servicio->bitacoracontacto = $notificame." Notificado por e-mail/llamada: ".$hoy."; ";
      $servicio->save();
      $ordens = $servicio->id;
      Session::flash('msg','Contacto con cliente registrado en bitacora para orden: '.$ordens.'');
      return Redirect::to('/servicio');
    }

    if ($contactName == 19){//SI NO SE ENCONTRO AL CLIENTE AGREGA BITACORA Y DEJA STATUS COMO NOTIFICADO
      $servicio = Serv::find($id);
      $fechaingreso1 = $servicio->fechaingreso;
      $servicio->fill($request->all());
      $servicio->status_id = 7;//cliente notificado en espera de recoleccion via correo
      $hoy = \Carbon\Carbon::now();
      $servicio->fechaingreso = $fechaingreso1;
      $notificame = $servicio->bitacoracontacto;
      $servicio->bitacoracontacto = $notificame." cliente NO localizado:".$hoy."; ";
      $servicio->save();
      $ordens = $servicio->id;
      Session::flash('notify','Cliente NO localizado se registro en bitacora para orden: '.$ordens.'');
      return Redirect::to('/servicio');
    }

    if ($contactName == 6){//SI STATUS = Equipo REGISTRADO, en espera de ingreso a sucursal; PERO NO ENVIADO A LA SUCURSAL DE REPARACION. es decir ya esta reparado aun no se envia a la sucursal //este status anteriormente es REPARADO: 6

      //return ($contactName);
      if ($contactEmail != " "){
         $idtres = 3; //para la imagen 
       $tres = Politica::find($idtres);
        $data = array('name'=>$contactName, 'email'=>$contactEmail, 'id'=>$contactId,'nombrecliente'=>$nombrecliente,'tres'=>$tres);
  Mail::send('emails.contact',$data,function($msj)use ($contactEmail, $contactName, $contactId, $nombrecliente){
          $msj->subject('IMPORTANTE:: Orden de servicio lista para ser entregada'); //Motivo del correo
          $msj->to($contactEmail);
        });
      }
      $servicio = Serv::find($id);
       $fechaingreso1 = $servicio->fechaingreso;
       $servicio->fill($request->all());

         //VAMOS A RECUPERAR LAS FECHAS Y ABONOS PARA EVALUAR SI ESTAN NULOS Y SI ES ASÍ PODER ACTUALIZAR SOLO ESTOS
      $fabono1s=$request->get('fechapago1');
      $fabono2s=$request->get('fechapago2');
      $fabono3s=$request->get('fechapago3');
      $fabono4s=$request->get('fechapago4');
      $fabono5s=$request->get('fechapago5');

      $Abono1ss=$request->get('abono1');
      $Abono2ss=$request->get('abono2');
      $Abono3ss=$request->get('abono3');
      $Abono4ss=$request->get('abono4');
      $Abono5ss=$request->get('abono5');

    if($fabono1s == "0000-00-00 00:00:00" && $Abono1ss != 0){
      $servicio->fechapago1= \Carbon\Carbon::now();
      $servicio->abono1= $Abono1ss;
    }

    if($fabono2s == "0000-00-00 00:00:00" && $Abono2ss != 0){
      $servicio->fechapago2= \Carbon\Carbon::now();
      $servicio->abono2= $Abono2ss;
    }

    if($fabono3s == "0000-00-00 00:00:00" && $Abono3ss != 0){
      $servicio->fechapago3= \Carbon\Carbon::now();
      $servicio->abono3= $Abono3ss;
    }

     if($fabono4s == "0000-00-00 00:00:00" && $Abono4ss != 0){
      $servicio->fechapago4= \Carbon\Carbon::now();
      $servicio->abono4= $Abono4ss;
    }

    if($fabono5s == "0000-00-00 00:00:00" && $Abono5ss != 0){
      $servicio->fechapago5= \Carbon\Carbon::now();
      $servicio->abono5= $Abono5ss;
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

       $servicio->fechaingreso = $fechaingreso1;
      $servicio->status_id = 6;//mantiene status reparado.
      $hoy = \Carbon\Carbon::now();
      //$hoy = $hoy->format('Y-m-d');
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
      $ordens = $servicio->id;
      Session::flash('notify','Orden '.$ordens.'notifico a cliente de REPARACIÓN via email');
      return Redirect::to('/servicio');
    }

    if ($contactName == 21){//SI STATUS = NO SE PUDO REVISAR
      $servicio = Serv::find($id);
       $fechaingreso1 = $servicio->fechaingreso;
       $servicio->fill($request->all());

         //VAMOS A RECUPERAR LAS FECHAS Y ABONOS PARA EVALUAR SI ESTAN NULOS Y SI ES ASÍ PODER ACTUALIZAR SOLO ESTOS
      $fabono1s=$request->get('fechapago1');
      $fabono2s=$request->get('fechapago2');
      $fabono3s=$request->get('fechapago3');
      $fabono4s=$request->get('fechapago4');
      $fabono5s=$request->get('fechapago5');

      $Abono1ss=$request->get('abono1');
      $Abono2ss=$request->get('abono2');
      $Abono3ss=$request->get('abono3');
      $Abono4ss=$request->get('abono4');
      $Abono5ss=$request->get('abono5');

    if($fabono1s == "0000-00-00 00:00:00" && $Abono1ss != 0){
      $servicio->fechapago1= \Carbon\Carbon::now();
      $servicio->abono1= $Abono1ss;
    }

    if($fabono2s == "0000-00-00 00:00:00" && $Abono2ss != 0){
      $servicio->fechapago2= \Carbon\Carbon::now();
      $servicio->abono2= $Abono2ss;
    }

    if($fabono3s == "0000-00-00 00:00:00" && $Abono3ss != 0){
      $servicio->fechapago3= \Carbon\Carbon::now();
      $servicio->abono3= $Abono3ss;
    }

     if($fabono4s == "0000-00-00 00:00:00" && $Abono4ss != 0){
      $servicio->fechapago4= \Carbon\Carbon::now();
      $servicio->abono4= $Abono4ss;
    }

    if($fabono5s == "0000-00-00 00:00:00" && $Abono5ss != 0){
      $servicio->fechapago5= \Carbon\Carbon::now();
      $servicio->abono5= $Abono5ss;
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

       $servicio->fechaingreso = $fechaingreso1;
      $hoy = \Carbon\Carbon::now();
      //$hoy = $hoy->format('Y-m-d');
      $servicio->fechanotifica= $hoy;//GUARDAMOS LA FECHA DE NOTIFICACION
      $notificame = $servicio->bitacoracontacto;
      //$servicio->bitacoracontacto = $notificame."No se pudo revisar:".$hoy."; ";//CAMPO DE BITACORA

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
      //$servicio->problemacliente = "NO SE PUDO REVISAR";
      //$servicio->solucion1 = "NO SE PUDO REVISAR";
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
      $ordens = $servicio->id;

      Session::flash('msg','Se registro orden '.$ordens.' sin revisar');
      return Redirect::to('/servicio');
    }

    if ($contactName == 22){//SI STATUS = NO SE PUDO REPARAR
      if ($contactEmail <> " "){
         $idtres = 3; //para la imagen 
       $tres = Politica::find($idtres);
        $data = array('name'=>$contactName, 'email'=>$contactEmail, 'id'=>$contactId,'nombrecliente'=>$nombrecliente,'tres'=>$tres);
        Mail::send('emails.contact',$data,function($msj)use ($contactEmail, $contactName, $contactId, $nombrecliente){
          $msj->subject('IMPORTANTE: Orden de servicio NO se pudo REPARAR'); //Motivo del correo
          $msj->to($contactEmail);
        });
      }
      $servicio = Serv::find($id);
       $fechaingreso1 = $servicio->fechaingreso;
       $servicio->fill($request->all());

         //VAMOS A RECUPERAR LAS FECHAS Y ABONOS PARA EVALUAR SI ESTAN NULOS Y SI ES ASÍ PODER ACTUALIZAR SOLO ESTOS
      $fabono1s=$request->get('fechapago1');
      $fabono2s=$request->get('fechapago2');
      $fabono3s=$request->get('fechapago3');
      $fabono4s=$request->get('fechapago4');
      $fabono5s=$request->get('fechapago5');

      $Abono1ss=$request->get('abono1');
      $Abono2ss=$request->get('abono2');
      $Abono3ss=$request->get('abono3');
      $Abono4ss=$request->get('abono4');
      $Abono5ss=$request->get('abono5');

    if($fabono1s == "0000-00-00 00:00:00" && $Abono1ss != 0){
      $servicio->fechapago1= \Carbon\Carbon::now();
      $servicio->abono1= $Abono1ss;
    }

    if($fabono2s == "0000-00-00 00:00:00" && $Abono2ss != 0){
      $servicio->fechapago2= \Carbon\Carbon::now();
      $servicio->abono2= $Abono2ss;
    }

    if($fabono3s == "0000-00-00 00:00:00" && $Abono3ss != 0){
      $servicio->fechapago3= \Carbon\Carbon::now();
      $servicio->abono3= $Abono3ss;
    }

     if($fabono4s == "0000-00-00 00:00:00" && $Abono4ss != 0){
      $servicio->fechapago4= \Carbon\Carbon::now();
      $servicio->abono4= $Abono4ss;
    }

    if($fabono5s == "0000-00-00 00:00:00" && $Abono5ss != 0){
      $servicio->fechapago5= \Carbon\Carbon::now();
      $servicio->abono5= $Abono5ss;
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

       $servicio->fechaingreso = $fechaingreso1;
      $servicio->status_id = 7;
      $hoy = \Carbon\Carbon::now();
    //  $hoy = $hoy->format('Y-m-d');
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
      $ordens = $servicio->id;
      Session::flash('notify','Orden '.$ordens.' notifico a cliente via email NO reparación');
      return Redirect::to('/servicio');
    }

    $resta = Input::get('resta');//PARA SABER SI EL CAMPO ESTA EN BLANCO
    $status = Input::get('status_id');//$status == 10 o ENTREGADO A CLIENTE

    if($contactName == '10' and $resta != '0'){  //STATUS: ENTREGADO A CLIENTE EN SUCURSAL
      //if($status == 10){
      Session::flash('msg1','AUN RESTA SALDO POR LIQUIDAR, No se puede colocar como entregada');
      return Redirect::to('/servicio');
      //}
    }else{

      $servicio = Serv::find($id);
       $fechaingreso1 = $servicio->fechaingreso;
       $servicio->fill($request->all());

       //VAMOS A RECUPERAR LAS FECHAS Y ABONOS PARA EVALUAR SI ESTAN NULOS Y SI ES ASÍ PODER ACTUALIZAR SOLO ESTOS
      $fabono1s=$request->get('fechapago1');
      $fabono2s=$request->get('fechapago2');
      $fabono3s=$request->get('fechapago3');
      $fabono4s=$request->get('fechapago4');
      $fabono5s=$request->get('fechapago5');

      $Abono1ss=$request->get('abono1');
      $Abono2ss=$request->get('abono2');
      $Abono3ss=$request->get('abono3');
      $Abono4ss=$request->get('abono4');
      $Abono5ss=$request->get('abono5');

    if($fabono1s == "0000-00-00 00:00:00" && $Abono1ss != 0){
      $servicio->fechapago1= \Carbon\Carbon::now();
      $servicio->abono1= $Abono1ss;
    }

    if($fabono2s == "0000-00-00 00:00:00" && $Abono2ss != 0){
      $servicio->fechapago2= \Carbon\Carbon::now();
      $servicio->abono2= $Abono2ss;
    }

    if($fabono3s == "0000-00-00 00:00:00" && $Abono3ss != 0){
      $servicio->fechapago3= \Carbon\Carbon::now();
      $servicio->abono3= $Abono3ss;
    }

     if($fabono4s == "0000-00-00 00:00:00" && $Abono4ss != 0){
      $servicio->fechapago4= \Carbon\Carbon::now();
      $servicio->abono4= $Abono4ss;
    }

    if($fabono5s == "0000-00-00 00:00:00" && $Abono5ss != 0){
      $servicio->fechapago5= \Carbon\Carbon::now();
      $servicio->abono5= $Abono5ss;
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////


       $servicio->fechaingreso = $fechaingreso1;
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
      $ordens = $servicio->id;

      Session::flash('msg','Orden '.$ordens.' actualizada correctamente');
      return Redirect::to('/servicio');
    }


    if($contactName <> 6){
      $servicio = Serv::find($id);
       $fechaingreso1 = $servicio->fechaingreso;
       $servicio->fill($request->all());


//VAMOS A RECUPERAR LAS FECHAS Y ABONOS PARA EVALUAR SI ESTAN NULOS Y SI ES ASÍ PODER ACTUALIZAR SOLO ESTOS
      $fabono1s=$request->get('fechapago1');
      $fabono2s=$request->get('fechapago2');
      $fabono3s=$request->get('fechapago3');
      $fabono4s=$request->get('fechapago4');
      $fabono5s=$request->get('fechapago5');

      $Abono1ss=$request->get('abono1');
      $Abono2ss=$request->get('abono2');
      $Abono3ss=$request->get('abono3');
      $Abono4ss=$request->get('abono4');
      $Abono5ss=$request->get('abono5');

    if($fabono1s == "0000-00-00 00:00:00" && $Abono1ss != 0){
      $servicio->fechapago1= \Carbon\Carbon::now();
      $servicio->abono1= $Abono1ss;
    }

    if($fabono2s == "0000-00-00 00:00:00" && $Abono2ss != 0){
      $servicio->fechapago2= \Carbon\Carbon::now();
      $servicio->abono2= $Abono2ss;
    }

    if($fabono3s == "0000-00-00 00:00:00" && $Abono3ss != 0){
      $servicio->fechapago3= \Carbon\Carbon::now();
      $servicio->abono3= $Abono3ss;
    }

     if($fabono4s == "0000-00-00 00:00:00" && $Abono4ss != 0){
      $servicio->fechapago4= \Carbon\Carbon::now();
      $servicio->abono4= $Abono4ss;
    }

    if($fabono5s == "0000-00-00 00:00:00" && $Abono5ss != 0){
      $servicio->fechapago5= \Carbon\Carbon::now();
      $servicio->abono5= $Abono5ss;
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////


       $servicio->fechaingreso = $fechaingreso1;
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

      $ordens = $servicio->id;
      Session::flash('msg','Orden'.$ordens.'actualizada correctamente');
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
    return ('hola');
    return('/pdf');
  }
}
