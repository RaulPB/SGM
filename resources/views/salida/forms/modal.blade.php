<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$serv->id}}">

    {!!Form::open(array('action'=>array('SalidasController@update',$serv->id),'method'=>'put'))!!}




    <div class="modal-dialog"  style="z-index: 1100;">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Confirmar recepción</h4>
            </div>
            <div class="modal-body">
                <?php
                use SGM\Producto;
                $nombreproducto = DB::table('productos')->where('id', '=', $serv->producto_id)->pluck('modelo');
                $nombresucursal = DB::table('sucursals')->where('id', '=', $serv->origen)->pluck('nameS');
                $nombresucursall = DB::table('sucursals')->where('id', '=', $serv->servicio_id)->pluck('nameS');

                //vamos a listar todos los productos relacionados para que sean seleccionables y poder editar el producto o crearlo de ser necesario
                $product = Producto::where('modelo','like', "%$nombreproducto%")->Where('sucursal_id', $serv->servicio_id)->get();
                $cantidadenviada = $serv->cantidad;

                ?>

                <h4><p>¿Desea recibir el siguiente articulo?:</h4> <h2>{{$nombreproducto}}</h2></p><br>
                <h4><p>Cantidad a recibir:</h4>                   
                    <div class="form-group col-md-12">
                        {!!Form::text('cantidade',$cantidadenviada,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
                    </div>
                    </p>
                    <br>
                <h4><p>Sucursal destino:</h4>
                                            <div class="form-group col-md-12">
                        {!!Form::text('nombresucursall',$nombresucursall,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
                    </div>
                </p>
                <br>
                    <h4><p>Sucursal origen:</h4> 
                         <div class="form-group col-md-12">
                        {!!Form::text('nombresucursal',$nombresucursal,['class'=>'form-control','placeholder'=>'','readonly' => 'true'])!!}
                    </div>
                    </p>
                    <br>

                    <div class="form-group col-md-12">
                        <label for="clientes">Productos y/o servicios relacionados</label>
                        <select name="idproducto" id="idproducto" class="form-control selectpicker" data-live-search="true">
                            @foreach($product as $producto)
                            <option value="{{$producto->id}}"> {{$producto->modelo}} </option>
                            @endforeach
                        </select>
                    </div>



                </div>
                <div class="modal-footer" align="center">
                    <button type="button" class= "btn btn-alert" data-dismiss="modal">¡NO!, seguire revisando</button>
                    <button type="submit" class= "btn btn-danger">¡SI!, RECIBIR en sucursal destino</button>
                </div>
            </div>
        </div>
        {!!Form::Close()!!}
