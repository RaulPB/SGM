<?php

namespace SGM\Http\Controllers;

use Illuminate\Http\Request;

use SGM\Http\Requests;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth',['only'=>'admin']);
    }

    public function index()
    {
        return view('index');
        //return "Hola";
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function reviews()
    {
        return view('reviews');
    }

    public function admin()
    {

        //return redirect('/admin')->with('message','Sucursal Creada Correctamente');
        return view('layouts/admin');
    }

        public function correo()
    {

        //return redirect('/admin')->with('message','Sucursal Creada Correctamente');
        return view('layouts/contacto');
    }

  
}
