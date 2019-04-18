<?php

namespace SGM\Http\Controllers;

use Illuminate\Http\Request;

use SGM\Http\Requests;
use SGM\Http\Controllers\Controller;
use SGM\Http\Requests\UserCreateRequest;
use SGM\Http\Requests\UserUpdateRequest;
use SGM\Perfil;//IMPORTANTE INCLUIR EL MODELO PARA QUE LO PUEDA LISTAR
use SGM\Sucursal; //IMPORTANTE INCLUIR EL MODELO PARA QUE LO PUEDA LISTAR
use SGM\User;
use Session;
use Redirect;
use Auth;
use DB;
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

        $idlogueadoperfil = Auth::user()->perfil_id; //recuperamos el perfil del usuario logueado para decidir que mostrarles.
        $idlogueadosucur = Auth::user()->sucursal_id; //recuperamos el perfil del usuario logueado para decidir que mostrarles.


        if($idlogueadoperfil == 1){
        $users = User::where('perfil_id','<>', '9')->where('sucursal_id',$idlogueadosucur)->paginate(10);
        
        return view('usuario.index', compact('users'));
        }else{
            $users = User::where('perfil_id','<>', '9')->paginate(10);
        return view('usuario.index', compact('users'));
        }

     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//creamos una carpeta usuario y esta almacenara la vista para crear
    {
        $idlogueadoperfil = Auth::user()->perfil_id; //recuperamos el perfil del usuario logueado para decidir que mostrarles.
       
        if($idlogueadoperfil == 1){ //ESTO ES PARA QUE SE LE MUESTRE A LOS JEFES DE UNIDAD.
          //$perfiles = Perfil::lists('perfil', 'id'); 
         $perfiles = DB::table('perfils')->where('id', '<>', '10')->where('id','<>','9')->lists('perfil', 'id');

        return view('usuario.create',compact('perfiles'));//variables a las que asigne campos reales de la base de datos
        }
        else{ //sis soy SUPER USER PUEDO VER TODO
        $perfiles = Perfil::lists('perfil', 'id'); //campos reales de la tabla para mostrar en selects
        $sucursal = Sucursal::lists('nameS', 'id');//campos reales de la tabla para mostrar en selects
        return view('usuario.create2',compact('perfiles','sucursal'));//variables a las que asigne campos reales de la base 
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request) //variable request que "cacha", el formulario enrutado
    {
         $idlogueadoperfil = Auth::user()->perfil_id; //
         $idlogueadosucur = Auth::user()->sucursal_id; //

     if($idlogueadoperfil == 1){ //ESTO ES PARA QUE SE LE MUESTRE A LOS JEFES DE UNIDAD.
       User::create([
            'sucursal_id'=>$idlogueadosucur,
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>$request['password'],
            'perfil_id'=>$request['perfil_id'],

        ]);
       return redirect('/usuario');//->with('message','Usuario Creado Correctamente'); //mandamos vista con mensaje que se
        }else{
            User::create([
            'sucursal_id'=>$request['sucursal_id'],
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>$request['password'],
            'perfil_id'=>$request['perfil_id'],

        ]);
       return redirect('/usuario');//->with('message','Usuario Creado Correctamente'); //mandamos vista con mensaje que se
        }

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
       /*  $user = User::find($id);
         $perfiles = Perfil::lists('perfil', 'id'); //campos reales de la tabla
         $sucursal = Sucursal::lists('nameS', 'id');
         return view('usuario.edit',['user'=>$user],compact('perfiles','sucursal'));*/


        $idlogueadoperfil = Auth::user()->perfil_id; //recuperamos el perfil del usuario logueado para decidir que mostrarles.
       
        if($idlogueadoperfil == 1){ //ESTO ES PARA QUE SE LE MUESTRE A LOS JEFES DE UNIDAD.
          //$perfiles = Perfil::lists('perfil', 'id'); 
         $user = User::find($id);
         $perfiles = DB::table('perfils')->where('id', '<>', '10')->where('id','<>','9')->lists('perfil', 'id');

        return view('usuario.edit',compact('perfiles','user'));//variables a las que asigne campos reales de la base de datos
        }
        else{ 
        //sis soy SUPER USER PUEDO VER TODO
        $user = User::find($id);
        $perfiles = Perfil::lists('perfil', 'id'); //campos reales de la tabla para mostrar en selects
        $sucursal = Sucursal::lists('nameS', 'id');//campos reales de la tabla para mostrar en selects
        return view('usuario.edit2',compact('perfiles','sucursal','user'));//variables a las que asigne campos reales de la base 
        }


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
