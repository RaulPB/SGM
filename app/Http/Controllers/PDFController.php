<?php

namespace Ifiix\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Ifiix\Http\Requests;
use Ifiix\Http\Controllers\Controller;
use Ifiix\Servicio;
use Ifiix\User;
use Ifiix\Serv;




class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $hoy = \Carbon\Carbon::now();
      $hoy = $hoy->format('Y-m-d');

        $servicio = Serv::id($request->get('id'))->paginate(5);
        return view('servicio.indexserv',compact('servicio'));
      //$usuarios = Serv::paginate(10);
      //return view('pdf.index', compact('usuarios'));

    }

    public function encuesta(){
      $hoy = \Carbon\Carbon::now();
       $hoy = $hoy->format('Y-m-d');
       $correo = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',0)->count();
       $espectacular = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',1)->count();
       $publicacion = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',2)->count();
       $local = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',3)->count();
       $recomendacion = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',4)->count();
       $medallon = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',5)->count();
       $flechas = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',6)->count();
       $redes = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',7)->count();
       $web = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',8)->count();
       $google = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',9)->count();
       $otronegocio = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',10)->count();
       $otros = DB::table('encuestas')->where('fecha','=', $hoy)->Where('encuesta',11)->count();


        
        $view =  \View::make('pdf.encuesta', compact('correo','espectacular','publicacion','local','recomendacion','
        medallon','flechas','redes','web','google','otronegocio','otros','medallon'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Encuesta'.'_'.$hoy);



    }

    public function invoice() //ventas diarias
    {
        //$user = DB::table('servs')->where('status_id', 10)->first();
       // $user= $user->costo;

       $hoy = \Carbon\Carbon::now();
       $hoy = $hoy->format('Y-m-d');


       //PAGOS EN EFECTIVO ANTICIPOS--------------------------------------------------------
       $pago1 = DB::table('servs')->where('status_id','<>', 10)->Where('status_id','<>', 11)->Where('tipopago1',1)->Where('fechapago1',$hoy)->sum('abono1');

       $pagos1 = DB::table('servs')->where('status_id','<>', 10)->Where('status_id','<>', 11)->Where('tipopago2',1)->Where('fechapago2',$hoy)->sum('abono2');
       $efectivoA = $pago1 + $pagos1;

       //PAGOS EN TARJETA ANTICIPOS--------------------------------------------------------
       $pago2 = DB::table('servs')->where('status_id','<>', 10)->Where('status_id','<>', 11)->Where('tipopago1',2)->Where('fechapago1',$hoy)->sum('abono1');

       $pagos2 = DB::table('servs')->where('status_id','<>', 10)->Where('status_id','<>', 11)->Where('tipopago2',2)->Where('fechapago2',$hoy)->sum('abono2');
       $tarejtaA = $pago2 + $pagos2;

      // -----------------------------------
       //PAGOS EN EFECTIVO CANCELADOS--------------------------------------------------------
       $pago5 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago1',1)->Where('fechapago1',$hoy)->sum('abono1');

       $pagos5 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago2',1)->Where('fechapago2',$hoy)->sum('abono2');
       $efectivoC = $pago5 + $pagos5;

       //PAGOS EN TARJETA CANCELADOS--------------------------------------------------------
       $pago6 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago1',2)->Where('fechapago1',$hoy)->sum('abono1');

       $pagos6 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago2',2)->Where('fechapago2',$hoy)->sum('abono2');
       $tarjetaC = $pago6 + $pagos6;

      // -----------------------------------
       //PAGOS EN EFECTIVO TERMINADOS--------------------------------------------------------
       $pago3 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago1',1)->Where('fechapago1',$hoy)->sum('abono1');

       $pagos3 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago2',1)->Where('fechapago2',$hoy)->sum('abono2');
       $efectivoT = $pago3 + $pagos3;

       //PAGOS EN TARJETA TERMINADOS--------------------------------------------------------
       $pago4 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago1',2)->Where('fechapago1',$hoy)->sum('abono1');

       $pagos4 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago2',2)->Where('fechapago2',$hoy)->sum('abono2');
       $tarjetaT = $pago4 + $pagos4;

       //UTILIDAD---COSTO VS COSTOAJUSTADO---------------------------
       $utilidad = DB::table('servs')->where('status_id','=', 10)->sum('costo');

       $utilidad2 = DB::table('servs')->where('status_id','=', 10)->sum('costoajustado');
       $uti = $utilidad - $utilidad2;
       //TOTALES
       $tarjeta = $tarejtaA + $tarjetaT + $tarjetaC;
       $efectivo = $efectivoA + $efectivoT + $efectivoC;

       //MANDAMOS A IMPRIMIR----------------------------------------------------------------
        $view =  \View::make('pdf.diario',
 compact('hoy','efectivoA','tarejtaA','efectivoT','tarjetaT','tarjeta','efectivo','uti','efectivoC','tarjetaC'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        //return $pdf->stream('Reporte_Diario'.'_'.$hoy);
        return view("pdf/diario");
    }

    public function semana(){ //ventas semanales
      //Extraemos la fecha de hoy y le damos formato
      $hoy = \Carbon\Carbon::now();
      $hoy2 = \Carbon\Carbon::now();
      $endDate = $hoy2->subWeek();
      $endDate = $endDate->format('Y-m-d'); //1 semana atras
      $hoy = $hoy->format('Y-m-d');//el dia de hoy

       //PAGOS EN EFECTIVO CANCELADOS--------------------------------------------------------
       $pago1 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago1',1)->Where('fechapago1','<=',$hoy)->Where('fechapago1','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono1');

       $pagos1 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago2',1)->Where('fechapago2','<=',$hoy)->Where('fechapago2','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono2');
       $efectivoC = $pago1 + $pagos1;

       //PAGOS EN TARJETA CANCELADOS--------------------------------------------------------
       $pago2 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago1',2)->Where('fechapago1','<=',$hoy)->Where('fechapago1','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono1');

       $pagos2 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago2',2)->Where('fechapago2','<=',$hoy)->Where('fechapago2','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono2');
       $tarjetaC = $pago2 + $pagos2;

      // -----------------------------------
       //PAGOS EN EFECTIVO TERMINADOS--------------------------------------------------------
       $pago3 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago1',1)->Where('fechapago1','<=',$hoy)->Where('fechapago1','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono1');

       $pagos3 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago2',1)->Where('fechapago2','<=',$hoy)->Where('fechapago2','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono2');
       $efectivoT = $pago3 + $pagos3;

       //PAGOS EN TARJETA TERMINADOS--------------------------------------------------------
       $pago4 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago1',2)->Where('fechapago1','<=',$hoy)->Where('fechapago1','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono1');

       $pagos4 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago2',2)->Where('fechapago2','<=',$hoy)->Where('fechapago2','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono2');
       $tarjetaT = $pago4 + $pagos4;

      //UTILIDAD NETA DE LA semana
      $totale = $efectivoC + $efectivoT;
      $depitoe = $tarjetaT + $tarjetaC;


      //MANDAMOS A IMPRIMIR----------------------------------------------------------------
      $view =  \View::make('pdf.semana', compact('efectivoC','tarjetaC','efectivoT','tarjetaT','hoy','endDate','totale','depitoe'))->render();
       $pdf = \App::make('dompdf.wrapper');
       $pdf->loadHTML($view);
       return $pdf->stream('Reporte_Semanal'.'_'.$endDate.'_'.$hoy);

    }


    public function mes(){
      //Extraemos la fecha de hoy y le damos formato
      $hoy = \Carbon\Carbon::now();
      $hoy2 = \Carbon\Carbon::now();
      $endDate = $hoy2->subMonth();
      $endDate = $endDate->format('Y-m-d'); //1 semana atras
      $hoy = $hoy->format('Y-m-d');//el dia de hoy

       //PAGOS EN EFECTIVO CANCELADOS--------------------------------------------------------
       $pago1 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago1',1)->Where('fechapago1','<=',$hoy)->Where('fechapago1','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono1');

       $pagos1 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago2',1)->Where('fechapago2','<=',$hoy)->Where('fechapago2','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono2');
       $efectivoC = $pago1 + $pagos1;

       //PAGOS EN TARJETA CANCELADOS--------------------------------------------------------
       $pago2 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago1',2)->Where('fechapago1','<=',$hoy)->Where('fechapago1','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono1');

       $pagos2 = DB::table('servs')->where('status_id','=', 11)->Where('tipopago2',2)->Where('fechapago2','<=',$hoy)->Where('fechapago2','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono2');
       $tarjetaC = $pago2 + $pagos2;

      // -----------------------------------
       //PAGOS EN EFECTIVO TERMINADOS--------------------------------------------------------
       $pago3 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago1',1)->Where('fechapago1','<=',$hoy)->Where('fechapago1','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono1');

       $pagos3 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago2',1)->Where('fechapago2','<=',$hoy)->Where('fechapago2','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono2');
       $efectivoT = $pago3 + $pagos3;

       //PAGOS EN TARJETA TERMINADOS--------------------------------------------------------
       $pago4 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago1',2)->Where('fechapago1','<=',$hoy)->Where('fechapago1','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono1');

       $pagos4 = DB::table('servs')->where('status_id','=', 10)->Where('tipopago2',2)->Where('fechapago2','<=',$hoy)->Where('fechapago2','>=',$endDate)->where('fechapago2','<=',$hoy)->sum('abono2');
       $tarjetaT = $pago4 + $pagos4;

      //UTILIDAD NETA DE LA semana
      $totale = $efectivoC + $efectivoT;
      $depitoe = $tarjetaT + $tarjetaC;


      //MANDAMOS A IMPRIMIR----------------------------------------------------------------
      $view =  \View::make('pdf.mes', compact('efectivoC','tarjetaC','efectivoT','tarjetaT','hoy','endDate','totale','depitoe'))->render();
       $pdf = \App::make('dompdf.wrapper');
       $pdf->loadHTML($view);
       return $pdf->stream('Reporte_Semanal'.'_'.$endDate.'_'.$hoy);

    }

    public function diaria()
    {
        $user = DB::table('servs')->where('status_id', 10)->first();
        $user= $user->id;
        //$data = $this->getData();
        //$date = date('Y-m-d');
        //$invoice = "2222";
        $view =  \View::make('pdf.diario', compact('user'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download('diario');
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//EN ESTE CONTROLADOR VAMOS A LANZAR LAS CONSULTAS PARA EL REPORTE DE VENTAS 
    {
      //RECIBIMOS LAS FECHAS DE LA INTERFAZ
        $fechauno = $request['fechainicial'];
        $fechados = $request['fechafinal'];
        $hoy = \Carbon\Carbon::now();
        $hoy = $hoy->format('Y-m-d');
        //EXTRAEREMOS LOS TOTALES DE LOS 5 CAMPOS EN SUS 5 TIPOS DE PAGO...DESPUES PASAREMOS A SACAR LAS ORDENES

       // EXTRAEMOS LOS 5 POSIBLES PAGOS DEL CAMPO DE PAGO1//////////
         $pago1 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago1','=',1)->sum('abono1');//efectivo
         $pago2 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago1','=',2)->sum('abono1');//tarjeta
         $pago3 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago1','=',3)->sum('abono1');//transferencia
         $pago4 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago1','=',4)->sum('abono1');//deposito
         $pago5 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago1','=',5)->sum('abono1');//paypal
         $efectivo = $pago1+$pago2+$pago3+$pago4+$pago5;

         //EXTRAEMOS LOS 5 POSIBLES PAGOS DEL CAMPO DE PAGO2//////////
        $pagos1 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago2','=',1)->sum('abono2');//efectivo
         $pagos2 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago2','=',2)->sum('abono2');//tarjeta
         $pagos3 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago2','=',3)->sum('abono2');//transferencia
         $pagos4 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago2','=',4)->sum('abono2');//deposito
         $pagos5 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago2','=',5)->sum('abono2');//paypal
         $efectivo1 = $pagos1+$pagos2+$pagos3+$pagos4+$pagos5;

          //EXTRAEMOS LOS 5 POSIBLES PAGOS DEL CAMPO DE PAGO3//////////
          $pagoss1 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago3','=',1)->sum('abono3');//efectivo
         $pagoss2 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago3','=',2)->sum('abono3');//tarjeta
         $pagoss3 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago3','=',3)->sum('abono3');//transferencia
         $pagoss4 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago3','=',4)->sum('abono3');//deposito
         $pagoss5 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago3','=',5)->sum('abono3');//paypal
         $efectivo2 = $pagoss1+$pagoss2+$pagoss3+$pagoss4+$pagoss5;

          //EXTRAEMOS LOS 5 POSIBLES PAGOS DEL CAMPO DE PAGO4//////////
          $pagosss1 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago4','=',1)->sum('abono4');//efectivo
         $pagosss2 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago4','=',2)->sum('abono4');//tarjeta
         $pagosss3 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago4','=',3)->sum('abono4');//transferencia
         $pagosss4 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago4','=',4)->sum('abono4');//deposito
         $pagosss5 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago4','=',5)->sum('abono4');//paypal
         $efectivo3 = $pagosss1+$pagosss2+$pagosss3+$pagosss4+$pagosss5;

          //EXTRAEMOS LOS 5 POSIBLES PAGOS DEL CAMPO DE PAGO5//////////
          $pagossss1 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago5','=',1)->sum('abono5');//efectivo
         $pagossss2 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago5','=',2)->sum('abono5');//tarjeta
         $pagossss3 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago5','=',3)->sum('abono5');//transferencia
         $pagossss4 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago5','=',4)->sum('abono5');//deposito
         $pagossss5 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago5','=',5)->sum('abono5');//paypal
         $efectivo4 = $pagossss1+$pagossss2+$pagossss3+$pagossss4+$pagossss5;
     /*   
         //SACAREMOS LAS ORDENES DE EFECTIVO DE LAS ORDENES POR TODAS LOS CAMPOS DE ABONOS
         $servs = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago1','=',1)->get();
         $servss = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago2','=',1)->get();
         $servsss = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago3','=',1)->get();
         $servssss = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago4','=',1)->get();
         $servsssss = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago5','=',1)->get();

         //SACAREMOS LAS ORDENES DE TARJETAS DE LAS ORDENES POR TODAS LOS CAMPOS DE ABONOS
         $t1 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago1','=',2)->get();
         $t2 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago2','=',2)->get();
         $t3 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago3','=',2)->get();
         $t4 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago4','=',2)->get();
         $t5 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago5','=',2)->get();

         //SACAREMOS LAS ORDENES DE TRANSFERENCIA DE LAS ORDENES POR TODAS LOS CAMPOS DE ABONOS
         $tr1 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago1','=',3)->get();
         $tr2 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago2','=',3)->get();
         $tr3 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago3','=',3)->get();
         $tr4 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago4','=',3)->get();
         $tr5 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago5','=',3)->get();

         //SACAREMOS LAS ORDENES DE DEPOSITO DE LAS ORDENES POR TODAS LOS CAMPOS DE ABONOS
         $de1 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago1','=',4)->get();
         $de2 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago2','=',4)->get();
         $de3 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago3','=',4)->get();
         $de4 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago4','=',4)->get();
         $de5 = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->where('tipopago5','=',4)->get();
*/

         $gr = DB::table('servs')->where('fechaingreso','>=',$fechauno)->where('fechaingreso','<=',$fechados)->get();
      
        $vaiable ="hola";


        $view =  \View::make('pdf.reporte', compact('vaiable','fechauno','fechados','gr','efectivo','efectivo1','efectivo2','efectivo3','efectivo4'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream('Ventas'.'_'.$hoy."pdf");
        //return view('pdf.reporte');




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
