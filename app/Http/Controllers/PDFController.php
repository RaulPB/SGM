<?php

namespace SGM\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Maatwebsite\Excel\Facades\Excel;
use SGM\Http\Requests;
use SGM\Http\Controllers\Controller;
use SGM\Servicio;
use SGM\User;
use SGM\Serv;
use SGM\Sucursal;
use SGM\Politica;




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
  

    }

    public function encuesta(){

      //$P5 = DB::table('servs')->where('tipopago5',5)->where('fechapago5', '>=',$fechauno)->where('fechapago5','<=',$fechados)->where('sucursal',$clie)->get();
       $idseis = 6; //para la imagen 
       $imagen = Politica::find($idseis);

      $hoy = \Carbon\Carbon::now();
       $hoy = $hoy->format('Y-m-d');
       $correo = DB::table('encuestas')/*->where('fecha','=', $hoy)*/->Where('encuesta',0)->count();
       $espectacular = DB::table('encuestas')/*->where('fecha','=', $hoy)*/->Where('encuesta',1)->count();
       $publicacion = DB::table('encuestas')/*->where('fecha','=', $hoy)*/->Where('encuesta',2)->count();
       $local = DB::table('encuestas')/*->where('fecha','=', $hoy)*/->Where('encuesta',3)->count();
       $recomendacion = DB::table('encuestas')/*->where('fecha','=', $hoy)*/->Where('encuesta',4)->count();
       $medallon = DB::table('encuestas')/*->where('fecha','=', $hoy)*/->Where('encuesta',5)->count();
       $flechas = DB::table('encuestas')/*->where('fecha','=', $hoy)*/->Where('encuesta',6)->count();
       $redes = DB::table('encuestas')/*->where('fecha','=', $hoy)*/->Where('encuesta',7)->count();
       $web = DB::table('encuestas')/*->where('fecha','=', $hoy)*/->Where('encuesta',8)->count();
       $google = DB::table('encuestas')/*->where('fecha','=', $hoy)*/->Where('encuesta',9)->count();
       $otronegocio = DB::table('encuestas')/*->where('fecha','=', $hoy)*/->Where('encuesta',10)->count();
       $otros = DB::table('encuestas')/*->where('fecha','=', $hoy)*/->Where('encuesta',11)->count();
       
     /*   $view =  \View::make('pdf.encuesta', compact('correo','espectacular','publicacion','local','recomendacion','
        medallon','flechas','redes','web','google','otronegocio','otros','medallon'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Encuesta'.'_'.$hoy);*/

        $suma = $correo+$espectacular+$publicacion+$local+$recomendacion+$medallon+$flechas+$redes+$web+$google+$otronegocio+$otros; 
        return view("pdf/encuesta",compact('correo','espectacular','publicacion','local','recomendacion','
        medallon','flechas','redes','web','google','otronegocio','otros','medallon','hoy','suma','imagen'));



    }

    public function horas(){ //metodo para mostrar la afluencia de clientes por horas
      $clientes = Sucursal::lists('nameS', 'id');
         return view('pdf.frecuencia',compact('clientes'));
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
       // return view("pdf/diario"); //LLAMAMOS LA VISTA DE PRESENTACION DEL REPORTE POR SUCURSAL Y FECHA
        /*$cliente = Sucursal::lists('nameS', 'id');
       
        return view('pdf.diario',compact('cliente'));*/
         $clientes = User::lists('name', 'id');

       return view('pdf.diario',compact('clientes'));
        //return View::make('pdf.diario')->with('clientes', $clientes);
       //return($cliente);
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
    public function create() //vista de seleccion 
    {
         $clientes = Sucursal::lists('nameS', 'id');
         return view('pdf.diario',compact('clientes'));
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
        $clie = $request['cliente']; //extraemos la sucursal que sera cliente de consulta de su información
        $hoy = \Carbon\Carbon::now();
        $hoy = $hoy->format('Y-m-d');

          //VAMOS A EXTRAER LOS TOTAL GENERAL DE LA VENTA DE TODO EL DIA 
          $total1= DB::table('servs')->where('fechapago1', '>=',$fechauno)->where('fechapago1','<=',$fechados)->sum('abono1');
           $total2= DB::table('servs')->where('fechapago1', '>=',$fechauno)->where('fechapago1','<=',$fechados)->sum('abono2');
           $total3= DB::table('servs')->where('fechapago1', '>=',$fechauno)->where('fechapago1','<=',$fechados)->sum('abono3');
           $total4= DB::table('servs')->where('fechapago1', '>=',$fechauno)->where('fechapago1','<=',$fechados)->sum('abono4');
           $total5= DB::table('servs')->where('fechapago1', '>=',$fechauno)->where('fechapago1','<=',$fechados)->sum('abono5');

           $GT = $total1+$total2+$total5+$total5+$total5;

    
///////////////////////VAMOS A EXTRAER EL TOTAL DE TODOS LOS ABONOS REPRESENTADOS EN LOS 5 ABONOS DE CADA SUCURSAL:
           //EFECTIVO EN LOS 5 ABONOS POR SUCURSAL ESPECIFICA:
              $A1 = DB::table('servs')->where('tipopago1',1)->where('fechapago1', '>=',$fechauno)->where('fechapago1','<=',$fechados)->where('sucursal',$clie)->sum('abono1');
           $A2 = DB::table('servs')->where('tipopago2',1)->where('fechapago2', '>=',$fechauno)->where('fechapago2','<=',$fechados)->where('sucursal',$clie)->sum('abono2');
           $A3 = DB::table('servs')->where('tipopago3',1)->where('fechapago3', '>=',$fechauno)->where('fechapago3','<=',$fechados)->where('sucursal',$clie)->sum('abono3');
           $A4 = DB::table('servs')->where('tipopago4',1)->where('fechapago4', '>=',$fechauno)->where('fechapago4','<=',$fechados)->where('sucursal',$clie)->sum('abono4');
           $A5 = DB::table('servs')->where('tipopago5',1)->where('fechapago5', '>=',$fechauno)->where('fechapago5','<=',$fechados)->where('sucursal',$clie)->sum('abono5');
           $AT = $A1+$A2+$A3+$A4+$A5;

           //TARJETA TIPO DE PAGO EN LOS 5 ABONOS POR SUCURSAL ESPECIFICA
           $B1 = DB::table('servs')->where('tipopago1',2)->where('fechapago1', '>=',$fechauno)->where('fechapago1','<=',$fechados)->where('sucursal',$clie)->sum('abono1');
           $B2 = DB::table('servs')->where('tipopago2',2)->where('fechapago2', '>=',$fechauno)->where('fechapago2','<=',$fechados)->where('sucursal',$clie)->sum('abono2');
           $B3 = DB::table('servs')->where('tipopago3',2)->where('fechapago3', '>=',$fechauno)->where('fechapago3','<=',$fechados)->where('sucursal',$clie)->sum('abono3');
           $B4 = DB::table('servs')->where('tipopago4',2)->where('fechapago4', '>=',$fechauno)->where('fechapago4','<=',$fechados)->where('sucursal',$clie)->sum('abono4');
           $B5 = DB::table('servs')->where('tipopago5',2)->where('fechapago5', '>=',$fechauno)->where('fechapago5','<=',$fechados)->where('sucursal',$clie)->sum('abono5');
           $BT = $B1+$B2+$B3+$B4+$B5;

            //TRANSFERENCIA TIPO DE PAGO EN LOS 5 ABONOS POR SUCURSAL ESPECIFICA
           $C1 = DB::table('servs')->where('tipopago1',3)->where('fechapago1', '>=',$fechauno)->where('fechapago1','<=',$fechados)->where('sucursal',$clie)->sum('abono1');
           $C2 = DB::table('servs')->where('tipopago2',3)->where('fechapago2', '>=',$fechauno)->where('fechapago2','<=',$fechados)->where('sucursal',$clie)->sum('abono2');
           $C3 = DB::table('servs')->where('tipopago3',3)->where('fechapago3', '>=',$fechauno)->where('fechapago3','<=',$fechados)->where('sucursal',$clie)->sum('abono3');
           $C4 = DB::table('servs')->where('tipopago4',3)->where('fechapago4', '>=',$fechauno)->where('fechapago4','<=',$fechados)->where('sucursal',$clie)->sum('abono4');
           $C5 = DB::table('servs')->where('tipopago5',3)->where('fechapago5', '>=',$fechauno)->where('fechapago5','<=',$fechados)->where('sucursal',$clie)->sum('abono5');
           $CT = $C1+$C2+$C3+$C4+$C5;

            //DEPOSITO TIPO DE PAGO EN LOS 5 ABONOS POR SUCURSAL ESPECIFICA
           $D1 = DB::table('servs')->where('tipopago1',4)->where('fechapago1', '>=',$fechauno)->where('fechapago1','<=',$fechados)->where('sucursal',$clie)->sum('abono1');
           $D2 = DB::table('servs')->where('tipopago2',4)->where('fechapago2', '>=',$fechauno)->where('fechapago2','<=',$fechados)->where('sucursal',$clie)->sum('abono2');
           $D3 = DB::table('servs')->where('tipopago3',4)->where('fechapago3', '>=',$fechauno)->where('fechapago3','<=',$fechados)->where('sucursal',$clie)->sum('abono3');
           $D4 = DB::table('servs')->where('tipopago4',4)->where('fechapago4', '>=',$fechauno)->where('fechapago4','<=',$fechados)->where('sucursal',$clie)->sum('abono4');
           $D5 = DB::table('servs')->where('tipopago5',4)->where('fechapago5', '>=',$fechauno)->where('fechapago5','<=',$fechados)->where('sucursal',$clie)->sum('abono5');
           $DT = $D1+$D2+$D3+$D4+$D5;
           
            //PAY PAL TIPO DE PAGO EN LOS 5 ABONOS POR SUCURSAL ESPECIFICA
           $E1 = DB::table('servs')->where('tipopago1',5)->where('fechapago1', '>=',$fechauno)->where('fechapago1','<=',$fechados)->where('sucursal',$clie)->sum('abono1');
           $E2 = DB::table('servs')->where('tipopago2',5)->where('fechapago2', '>=',$fechauno)->where('fechapago2','<=',$fechados)->where('sucursal',$clie)->sum('abono2');
           $E3 = DB::table('servs')->where('tipopago3',5)->where('fechapago3', '>=',$fechauno)->where('fechapago3','<=',$fechados)->where('sucursal',$clie)->sum('abono3');
           $E4 = DB::table('servs')->where('tipopago4',5)->where('fechapago4', '>=',$fechauno)->where('fechapago4','<=',$fechados)->where('sucursal',$clie)->sum('abono4');
           $E5 = DB::table('servs')->where('tipopago5',5)->where('fechapago5', '>=',$fechauno)->where('fechapago5','<=',$fechados)->where('sucursal',$clie)->sum('abono5');
           $ET = $E1+$E2+$E3+$E4+$E5;

           
           $TOT = $AT+$BT+$CT+$DT+$ET; //gran total de todo lo vendido en esa sucursal de todos los abonos no importa el tipo
//////////+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++///////////////

       //CON ESTAS CONSULTAS LA BASE DE LA CONSULTA ES EL DIA DE INICIO Y UN DIA ADELANTE DEL QUE QUEREMOS:
       //EJEMPLO: SI QUIERO DEL 10 DE NOVIEMBRE AL 10 DE NOVIEMBRE SE COLOCA ASI:
       //10-10-17  --> 11-10-17 DIGAMOS PARA EL REPORTE DE VENTAS DE UN SOLO DIA
           
       $E1 = DB::table('servs')->where('tipopago1',1)->where('fechapago1', '>=',$fechauno)->where('fechapago1','<=',$fechados)->where('sucursal',$clie)->get();
       $E2 = DB::table('servs')->where('tipopago2',1)->where('fechapago2', '>=',$fechauno)->where('fechapago2','<=',$fechados)->where('sucursal',$clie)->get();
       $E3 = DB::table('servs')->where('tipopago3',1)->where('fechapago3', '>=',$fechauno)->where('fechapago3','<=',$fechados)->where('sucursal',$clie)->get();
       $E4 = DB::table('servs')->where('tipopago4',1)->where('fechapago4', '>=',$fechauno)->where('fechapago4','<=',$fechados)->where('sucursal',$clie)->get();
       $E5 = DB::table('servs')->where('tipopago5',1)->where('fechapago5', '>=',$fechauno)->where('fechapago5','<=',$fechados)->where('sucursal',$clie)->get();
       ////////////CONSULTA DE PAGOS CON TARJETA//////////////////
       $T1 = DB::table('servs')->where('tipopago1',2)->where('fechapago1', '>=',$fechauno)->where('fechapago1','<=',$fechados)->where('sucursal',$clie)->get();
       $T2 = DB::table('servs')->where('tipopago2',2)->where('fechapago2', '>=',$fechauno)->where('fechapago2','<=',$fechados)->where('sucursal',$clie)->get();
       $T3 = DB::table('servs')->where('tipopago3',2)->where('fechapago3', '>=',$fechauno)->where('fechapago3','<=',$fechados)->where('sucursal',$clie)->get();
       $T4 = DB::table('servs')->where('tipopago4',2)->where('fechapago4', '>=',$fechauno)->where('fechapago4','<=',$fechados)->where('sucursal',$clie)->get();
       $T5 = DB::table('servs')->where('tipopago5',2)->where('fechapago5', '>=',$fechauno)->where('fechapago5','<=',$fechados)->where('sucursal',$clie)->get();
       ///////////TRANSFERENCIA
       $TS1 = DB::table('servs')->where('tipopago1',3)->where('fechapago1', '>=',$fechauno)->where('fechapago1','<=',$fechados)->where('sucursal',$clie)->get();
       $TS2 = DB::table('servs')->where('tipopago2',3)->where('fechapago2', '>=',$fechauno)->where('fechapago2','<=',$fechados)->where('sucursal',$clie)->get();
       $TS3 = DB::table('servs')->where('tipopago3',3)->where('fechapago3', '>=',$fechauno)->where('fechapago3','<=',$fechados)->where('sucursal',$clie)->get();
       $TS4 = DB::table('servs')->where('tipopago4',3)->where('fechapago4', '>=',$fechauno)->where('fechapago4','<=',$fechados)->where('sucursal',$clie)->get();
       $TS5 = DB::table('servs')->where('tipopago5',3)->where('fechapago5', '>=',$fechauno)->where('fechapago5','<=',$fechados)->where('sucursal',$clie)->get();
       ////////////DESPOSITO
       $D1 = DB::table('servs')->where('tipopago1',4)->where('fechapago1', '>=',$fechauno)->where('fechapago1','<=',$fechados)->where('sucursal',$clie)->get();
       $D2 = DB::table('servs')->where('tipopago2',4)->where('fechapago2', '>=',$fechauno)->where('fechapago2','<=',$fechados)->where('sucursal',$clie)->get();
       $D3 = DB::table('servs')->where('tipopago3',4)->where('fechapago3', '>=',$fechauno)->where('fechapago3','<=',$fechados)->where('sucursal',$clie)->get();
       $D4 = DB::table('servs')->where('tipopago4',4)->where('fechapago4', '>=',$fechauno)->where('fechapago4','<=',$fechados)->where('sucursal',$clie)->get();
       $D5 = DB::table('servs')->where('tipopago5',4)->where('fechapago5', '>=',$fechauno)->where('fechapago5','<=',$fechados)->where('sucursal',$clie)->get();
       ////////////PAY PAL
       $P1 = DB::table('servs')->where('tipopago1',5)->where('fechapago1', '>=',$fechauno)->where('fechapago1','<=',$fechados)->where('sucursal',$clie)->get();
       $P2 = DB::table('servs')->where('tipopago2',5)->where('fechapago2', '>=',$fechauno)->where('fechapago2','<=',$fechados)->where('sucursal',$clie)->get();
       $P3 = DB::table('servs')->where('tipopago3',5)->where('fechapago3', '>=',$fechauno)->where('fechapago3','<=',$fechados)->where('sucursal',$clie)->get();
       $P4 = DB::table('servs')->where('tipopago4',5)->where('fechapago4', '>=',$fechauno)->where('fechapago4','<=',$fechados)->where('sucursal',$clie)->get();
       $P5 = DB::table('servs')->where('tipopago5',5)->where('fechapago5', '>=',$fechauno)->where('fechapago5','<=',$fechados)->where('sucursal',$clie)->get();

       //++++++++++++  VAMOS A SACAR LOS GASTOS DE LA SUCURSAL SELECCIONADA   +++++++++++++++

       $gastog = DB::table('gastos')->where('created_at', '>',$fechauno)->where('created_at','<',$fechados)->where('sucursal',$clie)->get();

       $gastot= DB::table('gastos')->whereBetween('created_at', [$fechauno, $fechados])->where('sucursal',$clie)->sum('gasto');
       //++++++++++++ 
       $UTI = $TOT - $gastot;

       $idseis = 6; //para la imagen 
       $imagen = Politica::find($idseis);

  
       /* ESTE CODIGO COMENTADO ES PARA QUE LA SALIDA SEA EN PDF; SIN EMBARGO SE SOBRE CARGA EL COMPLEMENTO DE DOMPDF
       $view =  \View::make('pdf.reporte', compact('E1','E2','E3','E4','E5','T1','T2','T3','T4','T5','TS1','TS2','TS3','TS4','TS5','D1','D2','D3','D4','D5','P1','P2','P3','P4','P5','fechauno','fechados'))->render();
        $pdf = \App::make('dompdf.wrapper');
       $pdf->loadHTML($view);
       return $pdf->stream('Ventas'.'_'.$hoy."pdf");*/
       
       $varijs = 5.1;
       return view("pdf/reporte",compact('E1','E2','E3','E4','E5','T1','T2','T3','T4','T5','TS1','TS2','TS3','TS4','TS5','D1','D2','D3','D4','D5','P1','P2','P3','P4','P5','fechauno','fechados','GT','varijs','clie','TOT','AT','BT','CT','DT','ET','UTI','gastog','gastot','imagen'));


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
