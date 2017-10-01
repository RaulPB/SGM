<?php

namespace Ifiix\Http\Controllers;

use Illuminate\Http\Request;

use Ifiix\Http\Requests;
use Ifiix\Http\Controllers\Controller;
use Ifiix\Http\Requests\UserCreateRequest;
use Ifiix\Http\Requests\UserUpdateRequest;
use Ifiix\Perfil;//IMPORTANTE INCLUIR EL MODELO PARA QUE LO PUEDA LISTAR
use Ifiix\Sucursal; //IMPORTANTE INCLUIR EL MODELO PARA QUE LO PUEDA LISTAR
use Ifiix\User;
use Session;
use Redirect;
use Illuminate\Routing\Route;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()  //listado de los recursos disponibles en la base de datos
    {
        
        $users = User::where('perfil_id','<>', '8')->where('perfil_id','<>', '9')->paginate(10);
        return view('usuario.index', compact('users'));


     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//creamos una carpeta usuario y esta almacenara la vista para crear
    {
        $perfiles = Perfil::lists('perfil', 'id'); //campos reales de la tabla para mostrar en selects
        $sucursal = Sucursal::lists('nameS', 'id');//campos reales de la tabla para mostrar en selects
        return view('usuario.create',compact('perfiles','sucursal'));//variables a las que asigne campos reales de la base de datos
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request) //variable request que "cacha", el formulario enrutado
    {
       User::create([
            'sucursal_id'=>$request['sucursal_id'],
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>$request['password'],
            'perfil_id'=>$request['perfil_id'],

        ]);
       return redirect('/usuario');//->with('message','Usuario Creado Correctamente'); //mandamos vista con mensaje que se


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
         $user = User::find($id);
         $perfiles = Perfil::lists('perfil', 'id'); //campos reales de la tabla
         $sucursal = Sucursal::lists('nameS', 'id');
         return view('usuario.edit',['user'=>$user],compact('perfiles','sucursal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());//metodo para rellenar campos especificados en los modelos
        $user->save();
         Session::flash('message','Usuario Actualizado Correctamente');
        return Redirect::to('/usuario');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Session::flash('message','Usuario Eliminado Correctamente');
        return Redirect::to('/usuario');
    }
}
