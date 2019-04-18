<?php

namespace SGM\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use SGM\Http\Requests;
use SGM\Http\Controllers\Controller;
use SGM\DetalleVenta;
use SGM\Serv;
use SGM\Status;
use SGM\User;
use SGM\Tpago;
use SGM\Producto;
use DB;
use Carbon\Carbon;
use SGM\Http\Requests\ServicioCreate;
use SGM\Http\Requests\ServicioUpdate;
use Session;
use Redirect;
use Illuminate\Routing\Route;
use Illuminate\Database\Query\Builder;
use Log;
use SGM\Garantia;
use Mail;
use SGM\Politica;
use Auth;

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



             $servicio = Serv::idss($request->get('id'))->paginate(10000);


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
         //$articulos = DB::table('productos')->where('cantidad', '>', 0)->get();
         $idlogueado = Auth::user()->sucursal_id; //extraemos id del usuario logueado.
         $articulos = Producto::where('sucursal_id',"=", $idlogueado)->where("status", "=", "Activo")->get();
         $servicio = Serv::find($id);
         $id = $servicio->id;
         
         //$status = Status::lists('status', 'id');
        
         $status = Status::where('id', 1)->orwhere('id',2)->orwhere('id',3)->orwhere('id',4)->orwhere('id',5)->orwhere('id',6)->orwhere('id',7)->orwhere('id',21)->orwhere('id',22)->lists('status', 'id'); 
         
         $user = User::where('perfil_id', 3)->Where('sucursal_id',"=", $idlogueado)->lists('name', 'id'); //regresamos solo los tecnicos.
         $garantia = Garantia::lists('garantia','id');
         $pagor = Tpago::lists('pago', 'id');
         $detalles = DB::table('detalle_venta as d')
        ->join('productos as a','d.idarticulo','=','a.id')
        ->select('a.modelo as articulo','d.cantidad','d.precio_pub')
        ->where('d.idventa','=', $id)
        ->get();
        // return view('tecnico.edit',['servicio'=>$servicio],compact('status','user','garantia','pagor'));
         return view('tecnico.edit',["servicio" => $servicio,"status" => $status, "user" => $user, "garantia" => $garantia, "pagor" => $pagor, "articulos" => $articulos, "detalles" => $detalles, "id" => $id]);

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
        /*$servicio = Serv::find($id);
        $servicio->fill($request->all());
        $servicio->save();
        Session::flash('message','Orden actualizada');
        return Redirect::to('/admin');//->with('success'); con esto regresamo al menu principal*/
        $contactName = Input::get('status_id');
      
        $contactEmail = Input::get('email');
        $contactId = $id;//Input::get('id');
        $nombrecliente = Input::get('nombrecliente');


        if ($contactName == 6){//SI STATUS = REPARADO
          if ($contactEmail != " "){
             $idtres = 3; //para la imagen 
              $tres = Politica::find($idtres);
            $data = array('name'=>$contactName, 'email'=>$contactEmail, 'id'=>$contactId,'nombrecliente'=>$nombrecliente,'tres'=>$tres);
            Mail::send('emails.contact',$data,function($msj)use ($contactEmail, $contactName, $contactId, $nombrecliente){
              $msj->subject('SGM: Orden de servicio lista para ser entregada'); //Motivo del correo
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
          return Redirect::to('/admin');//->with('success');
        }

        if ($contactName == 21){//SI STATUS = NO SE PUDO REVISAR
          /*if ($contactEmail <> ""){
            $data = array('name'=>$contactName, 'email'=>$contactEmail, 'id'=>$contactId,'nombrecliente'=>$nombrecliente);
            Mail::send('emails.contact',$data,function($msj)use ($contactEmail, $contactName, $contactId, $nombrecliente){
              $msj->subject('Ifiix: Orden de servicio NO se pudo REVISAR'); //Motivo del correo
              $msj->to($contactEmail);
            });
          }*/
          $servicio = Serv::find($id);
          $servicio->fill($request->all());
          $servicio->status_id = 7;
          $hoy = \Carbon\Carbon::now();
          $hoy = $hoy->format('Y-m-d');
          $servicio->fechanotifica= $hoy;//GUARDAMOS LA FECHA DE NOTIFICACION
          $notificame = $servicio->bitacoracontacto;
          $servicio->bitacoracontacto = $notificame."No se pudo revisar:".$hoy."; ";
          /*$servicio->producto = "NO SE PUDO REVISAR";
          $servicio->marca = "NO SE PUDO REVISAR";
          $servicio->modelo = "NO SE PUDO REVISAR";
          $servicio->tipo = "NO SE PUDO REVISAR";
          $servicio->color = "NO SE PUDO REVISAR";
          $servicio->capacidad = "NO SE PUDO REVISAR";
          $servicio->serie = "NO SE PUDO REVISAR";
          $servicio->imei = "NO SE PUDO REVISAR";
          $servicio->contraseña = "NO SE PUDO REVISAR";
          $servicio->compañia = "NO SE PUDO REVISAR";
          $servicio->reparado = "NO SE PUDO REVISAR";*/
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


          Session::flash('message','Se notifico al cliente via correo electronico');
          return Redirect::to('/admin');//->with('success');
        }

        if ($contactName == 22){//SI STATUS = NO SE PUDO REPARAR
          if ($contactEmail <> " "){
             $idtres = 3; //para la imagen 
             $tres = Politica::find($idtres);
            $data = array('name'=>$contactName, 'email'=>$contactEmail, 'id'=>$contactId,'nombrecliente'=>$nombrecliente,'tres'=>$tres);
            Mail::send('emails.contact',$data,function($msj)use ($contactEmail, $contactName, $contactId, $nombrecliente){
              $msj->subject('SGM: Orden de servicio NO se pudo REPARAR'); //Motivo del correo
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
          $ordens = $servicio->id;
          Session::flash('message','Orden'.$ordens.'notifico a cliente via email NO reparación');
          return Redirect::to('/admin');//->with('success');
        }

        $resta = Input::get('resta');//PARA SABER SI EL CAMPO ESTA EN BLANCO
        $status = Input::get('status_id');//$status == 10 o ENTREGADO A CLIENTE

        if($contactName == '10' and $resta != '0'){  //STATUS: ENTREGADO A CLIENTE EN SUCURSAL
          //if($status == 10){
          Session::flash('message','AUN RESTA SALDO POR LIQUIDAR');
          return Redirect::to('/admin');//->with('success');
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
          return Redirect::to('/admin');//->with('success');
        }


        if($contactName <> 6){
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
          return Redirect::to('/admin');//->with('success');
        }
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
