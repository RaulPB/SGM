<?php

namespace SGM\Http\Controllers;

use Illuminate\Http\Request;
use SGM\Serv;
use SGM\Http\Requests;
use SGM\Http\Controllers\Controller;
use Redirect;
use DB;
use Auth;
use SGM\Garantia;
use SGM\Sucursal;
use SGM\Notas;
use SGM\Politica;
use Session;
use SGM\PC;
use SGM\Tablet;

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
    public function show($id) //nota de venta
    {  //NECESITAMOS CREAR AL FINAL JUSTO ANTES DE GUARDAR EL NUMERO DE LA NOTA CON EL QUE VAMOS A GUARDARLA
      $servicio = Serv::find($id); //encontramos el registro
      
      if($servicio->abono1 == 0 && $servicio->abono2 == 0 && $servicio->abono3 == 0 && $servicio->abono4 == 0 && $servicio->abono5 == 0){
        
        Session::flash('notify','NO SE PUEDE GENERAR NOTA DE VENTA SIN ABONOS REGISTRADOS');
        return Redirect::to('/servicio');

      }
      $idpoli = 1;
      $idavi = 2;
      $idtres = 3;
      $idcuatro = 4;
      $idseis = 6; //para la imagen http://localhost:8000/imagen1.png
      $poli = Politica::find($idpoli); //recuperamos la politica
      $avi = Politica::find($idavi); //recuperamos la politica
      $dire = Politica::find($idtres);
      $cabe = Politica::find($idcuatro);
      $imagen = Politica::find($idseis);
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
      $costo = $servicio->costo;
      $pago1 = $servicio->abono1;
      $pago2 = $servicio->abono2;
      $pago3 = $servicio->abono3;
      $pago4 = $servicio->abono4;
      $pago5 = $servicio->abono5;
      $resta = $servicio->costo;
      $resta = $resta - $pago1 - $pago2 - $pago3 - $pago4 - $pago5;
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
      $diagnostico2 = $servicio->diagnostico2;
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

      $gar = $servicio->garantia;
      $garantia = DB::table('garantias')->where('id', '=', $gar)->pluck('garantia');

      $letras = \NumeroALetras::convertir($costo);
      $receptor = $servicio->receptor; //recuperamos el nombre del receptor
      //EXTRAEREMOS LA SUCURSAL DEL RECEPTOR PARA PODER AGREGAR LAS SIGLAS A LA NOTA
       $idsucur = DB::table('users')->where('name', '=', $receptor)->pluck('sucursal_id');// sacamos el id de la sucursal
       $claven = DB::table('sucursals')->where('id', '=', $idsucur)->pluck('clavenota');
       $cont = DB::table('sucursals')->where('id', '=', $idsucur)->pluck('contador');
       $cont = $cont + 1; //sumamos 1 al contador
       $suci = Sucursal::find($idsucur);//ubicamos la sucursal
       $suci->contador=$cont;//sumamos al contador correpondiente
       $nombre = $claven.$cont;
       $suci->save();//guardamos el nuevo contador en la sucursal
       //CREAREMOS UN NUMERO CONSECUTIVO PARA CADA NOTA NUEVA QUE SE IMPRIMA-> AUNQUE SE GUARDA LA VENTA EL NUMERO
      //SE INCREMENTA SIEMPRE POR CUESTIONES CONTABLES.
      Notas::create([
        'venta'=>$servicio->id, // guardamos el id de la ventas
        //LA FECHA DE LA EMISION DE LA NOTA SE GUARDA EN created_at
        'abono1'=>$servicio->abono1,
        'abono2'=>$servicio->abono2,
        'abono3'=>$servicio->abono3,
        'abono4'=>$servicio->abono4,
        'abono5'=>$servicio->abono5,
        'detalle'=>$servicio->diagnostico2,
        'nota'=>$claven.$cont
        //'entrega'=>$servicio->created_at
        ]);

        //$idN  = Notas::where('venta',$id)->get()->last();
        //$idN2 = $idN->id;
        //return($idsucur);
      $telefono = $servicio->telefono;
      $view =  \View::make('pdf.invoice0', compact('cont','claven','id','nombrecliente','diagnostico2','fechaentrega','fecharecepcion','marca','modelo','tipo','ns','imei','color','problemacliente','diagnostico1','receptor','costo','receptor','abonos',
      'enciende','benciende','bvolumen','bvolumen','bvibrador','pantalla','touch','display','ctrasera','cfrontal','ccarga',
      'altavoz','microfono','auricular','boexterna','jack','wifi','bluetooth','datosm','bateria','portasim','sim','bhome',
      'touchid','sensorp','carcasa','teclado','señal','compañia','date','letras','garantia','pago1','pago2','pago3','pago4','pago5','telefono','gar2','poli','avi','dire','cabe','imagen','resta'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->setPaper('A3', 'portrait');
      $pdf->loadHTML($view);
      return $pdf->download("Orden ".$id."__".$date);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //para imprimir orden de servicio
    {


      $idpoli = 1;
      $idavi = 2;
      $idtres = 3;
      $idcuatro = 4;
      $idcinco = 5; //pie de pagina de orden de servicio 
      $idseis = 6; //para la imagen de los formatos
      $poli = Politica::find($idpoli); //recuperamos la politica
      $avi = Politica::find($idavi); //recuperamos la politica
      $dire = Politica::find($idtres);
      $imagen = Politica::find($idseis);
      $pie = Politica::find($idcinco);


        $mensaje = "mensaje especifico que puede cambiar dahab para las politicas";
        $servicio = Serv::find($id); //encontramos el registro
        $date = $servicio->created_at;

        if($servicio->producto == "MACBOOK-PC"){
            $ubicapc = $servicio->idservpc;
            $pcubi = Pc::find($ubicapc);
            $costo = $servicio->costo;
            $pago1 = $servicio->abono1;
            $pago2 = $servicio->abono2;
            $abonos = $pago1 + $pago2;
            $gar = $servicio->garantia;
            $receptor = $servicio->receptor;
            $garantia = DB::table('garantias')->where('id', '=', $gar)->pluck('garantia');
            $idsucur = DB::table('users')->where('name', '=', $receptor)->pluck('sucursal_id');
            $claven = DB::table('sucursals')->where('id', '=', $idsucur)->pluck('nameS');

           
            $view =  \View::make('pdf.ordenpc', compact('pcubi','servicio','imagen','pie','abonos','avi','poli','claven','costo','dire'))->render();

            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('Legal', 'portrait');
            $pdf->loadHTML($view);
            return $pdf->stream("Orden ".$id."__".$date);
        }

        if($servicio->producto == "IPAD-TABLET"){
            $ubicapc = $servicio->idservtablet;
            $pcubi = Tablet::find($ubicapc);
            $costo = $servicio->costo;
            $pago1 = $servicio->abono1;
            $pago2 = $servicio->abono2;
            $abonos = $pago1 + $pago2;
            $gar = $servicio->garantia;
            $receptor = $servicio->receptor;
            $garantia = DB::table('garantias')->where('id', '=', $gar)->pluck('garantia');
            $idsucur = DB::table('users')->where('name', '=', $receptor)->pluck('sucursal_id');
            $claven = DB::table('sucursals')->where('id', '=', $idsucur)->pluck('nameS');

           
            $view =  \View::make('pdf.ordentablet', compact('pcubi','servicio','imagen','pie','abonos','avi','poli','claven','costo','dire'))->render();

            $pdf = \App::make('dompdf.wrapper');
            $pdf->setPaper('Legal', 'portrait');
            $pdf->loadHTML($view);
            return $pdf->stream("Orden ".$id."__".$date);
        }



        $compañia = $servicio->compañia;
        $id = $servicio->id;        
        $nombrecliente = $servicio->nombrecliente;
        $fechaentrega = $servicio->fechaentrega;
        $fecharecepcion = $servicio->created_at;
        $marca = $servicio->marca;
        $modelo = $servicio->modelo;
        $tipo = $servicio->producto;
        $ns = $servicio->serie;
        $imei = $servicio->imei;
        $color = $servicio->color;
        $celular = $servicio->celular;
        $contraseña = $servicio->contraseña;
        $problemacliente = $servicio->problemacliente;
        $diagnostico1 = $servicio->diagnostico1;
        $diagnostico2 = $servicio->diagnostico2;
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
        $gar = $servicio->garantia;
        $garantia = DB::table('garantias')->where('id', '=', $gar)->pluck('garantia');

        //$receptor = $venta->receptor; //recuperamos el nombre del receptor
        //EXTRAEREMOS LA SUCURSAL DEL RECEPTOR PARA PODER AGREGAR LAS SIGLAS A LA NOTA
        $idsucur = DB::table('users')->where('name', '=', $receptor)->pluck('sucursal_id');// sacamos el id de la sucursal
        $claven = DB::table('sucursals')->where('id', '=', $idsucur)->pluck('nameS');

        $view =  \View::make('pdf.nota', compact('id','nombrecliente','fechaentrega','fecharecepcion','marca','modelo','tipo','ns','imei','color','problemacliente','diagnostico1','receptor','costo','receptor','abonos',
        'enciende','benciende','bvolumen','bvolumen','bvibrador','pantalla','touch','display','ctrasera','cfrontal','ccarga',
        'altavoz','microfono','auricular','boexterna','jack','wifi','bluetooth','datosm','bateria','portasim','sim','bhome',
        'touchid','sensorp','carcasa','teclado','señal','compañia','diagnostico2','claven','garantia','avi','poli','dire','imagen','pie','celular','contraseña'))->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('Legal', 'portrait');


        $pdf->loadHTML($view);
        return $pdf->stream("Orden ".$id."__".$date);
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
