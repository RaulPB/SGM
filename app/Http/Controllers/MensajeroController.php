<?php

namespace Ifiix\Http\Controllers;

use Illuminate\Http\Request;

use Ifiix\Http\Requests;
use Ifiix\Http\Controllers\Controller;
use Ifiix\Serv;
use Ifiix\Status2;
use Ifiix\Status;
use Ifiix\User;
use Ifiix\Compras;
use Ifiix\Proveedor;
use DB;
use Ifiix\Http\Requests\CompraCreate;
use Ifiix\Http\Requests\CompraUpdate;
use Session;
use Redirect;
use Illuminate\Routing\Route; 
use Illuminate\Database\Query\Builder;
class MensajeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $ids=$_GET['idss']; 
            $comp = Compras::where('status_id', 2)->where('mensajero_id',$ids)->paginate(1000); //falta ponerle el filtro por Id`s de mensajero acorde a
            return view('compras.index2',compact('comp')); //VAMOS A HACER MEJOPR SU PROPIO INDEX
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
        $idprov= Compras::find($id);
        $idprov2=$idprov->proveedor_id;
        $prov=Proveedor::find($idprov2);
        $dire=$prov->ubicacion;

        $proveedor = Proveedor::lists('proveedor', 'id');//
        $mensajero_id = User::where('perfil_id', '=', 4)->lists('name', 'id');; //id del mensajero;
        $status = Status2::lists('status', 'id');
        $servicio = Serv::where('status_id', '<>', 10)->Where('status_id', '<>', 11)->lists('id', 'id');
        $comp = Compras::find($id);
    return view('mensajero.edit',['comp'=>$comp],compact('servicio','proveedor','status','mensajero_id','dire'));
        //return($dire);
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
         $comp = Compras::find($id);
        $comp->fill($request->all());//metodo para rellenar campos especificados en los modelos  
        $comp->save();
        Session::flash('message','Solicitud de Compra actualizada correctamente');
       // return Redirect::to('/compram/create');
        return Redirect::back();
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
