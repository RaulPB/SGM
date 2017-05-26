<?php 
namespace Ifiix\Http\Controllers;

use Illuminate\Http\Request;
use Auth;//utilizado para la validacion de acceso
use Session;
use Redirect;
use Ifiix\Http\Requests;
use Ifiix\Http\Controllers\Controller;
use Ifiix\Http\Requests\LoginRequest;//utilizado para la validacion de acceso
use Ifiix\User;
use Ifiix\Mensaje;
use DB;

class LogController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request) //LoginRequest $request aqui tenemos que poner un request que valide el correcto funcionamiento de acceso al sistema.
    {
        if(Auth::attempt(['email'=> $request['email'],'password'=>$request['password']])){ //si coinciden
            //return Redirect::to('admin');//ESTA REDIRECCION ES PARA CUANDO NO RECUPERAMOS DATOS DEL MENSAJE
           // $mensaje = Mensaje::where('id', '=', 1)->get()->first();
        //$x=$mensaje ->mensaje;
        return redirect('/admin');//->with('success', $x);
        }
        Session::flash('message-error', 'Datos Incorrectos');
        return Redirect::to('/');
  
 
       /* $mensaje = Mensaje::where('id', '=', 1)->get()->first();
        $x=$mensaje ->mensaje;
        return redirect('/admin')->with('success', $x);*/
    }

    public function logout(){
        Auth::logout();
        return Redirect::to('/');
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
       //return redirect('/pdf');
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
