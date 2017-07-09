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
use Ifiix\Sucursal;
use Ifiix\Tpago;
use Ifiix\Mensaje;
use DB;
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


        $status = Status::lists('status', 'id');
        $user = User::where('perfil_id', 3)->lists('name', 'id'); //regresamos solo los tecnicos.
        $pagor = Tpago::lists('pago', 'id');
        //$employees = Employee::where('branch_id', 9)->get()->lists('full_name', 'id');
        return view('servicio.create',compact('status','user','pagor','dire'));//variables a las que asigne campos reales de la base de datos
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
        Serv::create([
        //'receptor'=>$request['receptor'],
        'fechaingreso'=>$request['fechaingreso'],
        'nombrecliente'=>$request['nombrecliente'],
        'telefono'=>$request['telefono'],
        'celular'=>$request['celular'],
        'email'=>$request['email'],
        'producto'=>$request['producto'],
        'marca'=>$request['marca'],
        'modelo'=>$request['modelo'],
        'tipo'=>$request['tipo'],
        'color'=>$request['color'],
        'capacidad'=>$request['capacidad'],
        'serie'=>$request['serie'],
        'email'=>$request['email'],
        'contraseña'=>$request['contraseña'],
        'compañia'=>$request['compañia'],
        'reparado'=>$request['reparado'],
        'agua'=>$request['agua'],
        'ingresoso'=>$request['ingresoso'],
        'enciende'=>$request['enciende'],
        'benciende'=>$request['benciende'],
        'bvolumen'=>$request['bvolumen'],
        'bvibrador'=>$request['bvibrador'],
        'pantalla'=>$request['pantalla'],
        'touch'=>$request['touch'],
        'display'=>$request['display'],
        'ctrasera'=>$request['ctrasera'],
        'cfrontal'=>$request['cfrontal'],
        'ccarga'=>$request['ccarga'],
        'altavoz'=>$request['altavoz'],
        'microfono'=>$request['microfono'],
        'auricular'=>$request['auricular'],
        'boexterna'=>$request['boexterna'],
        'jack'=>$request['jack'],
        'wifi'=>$request['wifi'],
        'bluetooth'=>$request['bluetooth'],
        'datosm'=>$request['datosm'],
        'bateria'=>$request['bateria'],
        'portasim'=>$request['portasim'],
        'sim'=>$request['sim'],
        'imei'=>$request['imei'],
        'bhome'=>$request['bhome'],
        'touchid'=>$request['touchid'],
        'sensorp'=>$request['sensorp'],
        'carcasa'=>$request['carcasa'],
        'teclado'=>$request['teclado'],
        'señal'=>$request['señal'],
        'problemacliente'=>$request['problemacliente'],
        'solucion1'=>$request['solucion1'],
        'diagnostico1'=>$request['diagnostico1'],
        'diagnostico2'=>$request['diagnostico2'],
        'fechaentrega'=>$request['fechaentrega'],
        'fechanotifica'=>$request['fechanotifica'],
        'fechapago1'=>$request['fechapago1'],
        'fechapago2'=>$request['fechapago2'],
        'costo'=>$request['costo'],
        'costoajustado'=>$request['costoajustado'],
        'razon'=>$request['razon'],
        'status_id'=>$request['status_id'],
        'tecnico_id'=>$request['tecnico_id'],
        'receptor'=>$request['receptor'],
        'fechaentrega'=>$request['fechaentrega'],
        'tipopago1'=>$request['tipopago1'],
        'tipopago2'=>$request['tipopago2'],
        'abono1'=>$request['abono1'],
        'abono2'=>$request['abono2'],
        //tipopago1','tipopago2','abono1','abono2']
        ]);

       //return redirect('/servicio')->with('message','Servicio guardado correctamente');
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

        public function index(Request $request)
    {
        //dd($request->get('id')); //PARA VALIDAR HASTA QUE PUNTO TODO VA FUNCIONANDO EN EL PASO DE DATOS
       $servicio = Serv::id($request->get('id'))->paginate(10);
       //$servicio = Serv::where('status_id', '<>', 10)->paginate(10);
        return view('servicio.indexserv',compact('servicio'));
    }

     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $servicio = Serv::find($id);
         $status = Status::where('status','<>',15)->where('status','<>',1)->lists('status', 'id');

         $user = User::where('perfil_id', 3)->lists('name', 'id');
         $garantia = Garantia::lists('garantia','id');
         $pagor = Tpago::lists('pago', 'id');
         return view('servicio.editserv',['servicio'=>$servicio],compact('status','user','garantia','pagor'));
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
        //$cantidad2 = $request->input("status_id");   //recuperamos el campo de status para saber si enviar o no el correo el estatus para enviar debe de ser el 7

    $contactName = Input::get('status_id');
    $contactEmail = Input::get('email');
    $contactId = $id;//Input::get('id');
    $nombrecliente = Input::get('nombrecliente');


    if ($contactName == 6){//SI STATUS = CLIENTE NOTIFICADO EN ESPERA DE RECOLECCIÓN REPARADO
      $data = array('name'=>$contactName, 'email'=>$contactEmail, 'id'=>$contactId,'nombrecliente'=>$nombrecliente);
        Mail::send('emails.contact',$data,function($msj)use ($contactEmail, $contactName, $contactId, $nombrecliente){
                $msj->subject('Ifiix: Orden de servicio lista para ser entregada'); //Motivo del correo
                $msj->to($contactEmail);
        });

                $servicio = Serv::find($id);
                $servicio->fill($request->all());
                $servicio->status_id = 7;
                $servicio->save();
                Session::flash('message','Se notifico al cliente via correo electronico');
                return Redirect::to('/servicio');
        }

  if ($contactName == 21){//SI STATUS = NO SE PUDO REVISAR
            $data = array('name'=>$contactName, 'email'=>$contactEmail, 'id'=>$contactId,'nombrecliente'=>$nombrecliente);
            Mail::send('emails.contact',$data,function($msj)use ($contactEmail, $contactName, $contactId, $nombrecliente){
                    $msj->subject('Ifiix: Orden de servicio NO se pudo revisar'); //Motivo del correo
                    $msj->to($contactEmail);
            });
            }

        $resta = Input::get('resta');//PARA SABER SI EL CAMPO ESTA EN BLANCO
        $status = Input::get('status_id');//$status == 10 o ENTREGADO A CLIENTE

        if($contactName == '10' and $resta != '0'){
            //if($status == 10){
            Session::flash('message','AUN RESTA SALDO POR LIQUIDAR');
            return Redirect::to('/servicio');
            //}
        }else{

        $servicio = Serv::find($id);
        $servicio->fill($request->all());
        $servicio->save();
        Session::flash('message','Orden actualizada correctamente');
        return Redirect::to('/servicio');
        }


  if($contactName <> 6){
        $servicio = Serv::find($id);
        $servicio->fill($request->all());
        $servicio->save();
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
