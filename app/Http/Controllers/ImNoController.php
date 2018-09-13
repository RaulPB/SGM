<?php

namespace SGM\Http\Controllers;

use Illuminate\Http\Request;

use SGM\Http\Requests;
use SGM\Http\Controllers\Controller;
use Redirect;
use DB;
use SGM\Garantia;
use SGM\Notas;
use SGM\Serv;
use SGM\Politica;

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
    public function store(Request $request)//de aqui partimos 
    {

        $fechauno = $request['fechainicial'];
        $fechados = $request['fechafinal'];
        $clie = $request['cliente']; //extraemos la sucursal que sera cliente de consulta de su información
        $hoy = \Carbon\Carbon::now();
        $ocho = (new \Carbon\Carbon($fechauno))->format('Y-m-d 08:00:00');
        $diez = (new \Carbon\Carbon($fechauno))->format('Y-m-d 10:00:00');
        $doce = (new \Carbon\Carbon($fechauno))->format('Y-m-d 12:00:00');
        $dos = (new \Carbon\Carbon($fechauno))->format('Y-m-d 14:00:00');
        $cuatro = (new \Carbon\Carbon($fechauno))->format('Y-m-d 16:00:00');
        $seis = (new \Carbon\Carbon($fechauno))->format('Y-m-d 18:00:00');
        $ochos = (new \Carbon\Carbon($fechauno))->format('Y-m-d 20:00:00');

        //Realizamos la consulta de las consultas de sucursal especifica entre distintas horas.

        // Inicia a las 8 am. created_at
        $F1 = DB::table('servs')->where('created_at', '>=',$ocho)->where('created_at','<=',$diez)->where('sucursal',$clie)->count();
        $F2 = DB::table('servs')->where('created_at', '>=',$diez)->where('created_at','<=',$doce)->where('sucursal',$clie)->count();
        $F3 = DB::table('servs')->where('created_at', '>=',$doce)->where('created_at','<=',$dos)->where('sucursal',$clie)->count();
        $F4 = DB::table('servs')->where('created_at', '>=',$dos)->where('created_at','<=',$cuatro)->where('sucursal',$clie)->count();
        $F5 = DB::table('servs')->where('created_at', '>=',$cuatro)->where('created_at','<=',$seis)->where('sucursal',$clie)->count();
        $F6 = DB::table('servs')->where('created_at', '>=',$seis)->where('created_at','<=',$ochos)->where('sucursal',$clie)->count();

       // $F7 = Serv::wherecreated_at('created_at', '>=',$ocho)->where('created_at','<=',$diez)->count()
        ////////////////////////////////
        //return ($F7);

       
        $idseis = 6; //para la imagen 
       $imagen = Politica::find($idseis);

         return view("pdf/reporte2",compact('F1','F2','F3','F4','F5','F6','hoy','imagen'));
        //return("REPORTE DE AFLUENCIA DE CLIENTES POR HORAS usando created_at de servicios");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $idpoli = 1;
      $idavi = 2;
      $idtres = 3;
      $idcuatro = 4;
      $poli = Politica::find($idpoli); //recuperamos la politica
      $avi = Politica::find($idavi); //recuperamos la politica
      $dire = Politica::find($idtres);
      $cabe = Politica::find($idcuatro);
        $idseis = 6; //para la imagen 
       $imagen = Politica::find($idseis);
      $notas = Notas::find($id); //encontramos la nota
      $venta = $notas->venta; //extraemos el numero de la venta
      $servicio = Serv::find($venta);//buscamos la venta con el id recuperado
      $nota = $notas->nota;
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

      //zacaremos la garantia
      $gar=$servicio->garantia;
      $garantia = DB::table('garantias')->where('id', '=', $gar)->pluck('garantia');

      $view =  \View::make('pdf.invoice00', compact('nota','garantia','cliente','letras','diagnostico2','modelo','marca','telefono','celular','anticipo1','anticipo2','anticipo3','anticipo4','anticipo5','total','fecha','venta','poli','avi','dire','cabe','imagen'))->render();
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
