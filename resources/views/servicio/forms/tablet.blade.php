     <!-- Modal para movil-->
            <div id="myModal3" class="modal fade modal-slide-in-right" role="dialog">
              <div class="modal-dialog modal-lg" style="z-index: 1100;">

                <!-- Modal content-->
                <div  align="center" class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registro de datos para IPAD / TABLET  </h4>
                  </div>

                
                  <div class="modal-body">
                   <div class="form-group col-md-4" id="uno" >
                     Producto del cliente:{!!Form::text('productot',null,['class'=>'form-control','id'=>'producto','placeholder'=>''])!!}
                   </div>

 

                   <div class="form-group col-md-4" id="2" >
                     Marca del producto:{!!Form::text('marcat',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>


                   <div class="form-group col-md-4" id="3">
                     Modelo del Producto:{!!Form::text('modelot',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   <div class="form-group col-md-4" id="4">
                     Tipo Producto:{!!Form::text('tipot',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   <div class="form-group col-md-4" id="5">
                     Color Producto:{!!Form::text('colort',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>

                   <div class="form-group col-md-4" id="6">
                     Memoria Producto:{!!Form::text('memoriat',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   <div class="form-group col-md-4" id="7">
                     Procesador Producto:{!!Form::text('procesadort',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   <div class="form-group col-md-4" id="8">
                     Disco duro producto:{!!Form::text('discot',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   <div class="form-group col-md-4" id="9">
                     S/N Producto:{!!Form::text('seriet',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   
                    <div class="form-group col-md-4" id="11">
                     ¿Alguien intento reparar el equipo antes?
                     {!!Form::select('reparadot', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}

                   </div>
                   <div class="form-group col-md-4" id="12">
                     ¿Estuvo en contacto con agua? {!!Form::select('aguat', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-4" id="14">
                     ¿Enciende?
                    <center> {!!Form::select('enciendet', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div></center>

                    <div class="form-group col-md-12" id="10">
                     Entra al sistema:<center>{!!Form::select('sistemat', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}</center>
                    </div>

                     <div class="form-group col-md-4" >
                     ¿Deja cargador?
                     <center>{!!Form::select('cargadort', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>

                  <div class="form-group col-md-4" >
                     ¿Numero de cargador?:{!!Form::text('seriecargadort',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>

                   <div class="form-group col-md-4" id="17">
                     ¿Equipo golpeado?
                     <center>{!!Form::select('golpeadot', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>

                   <div class="form-group col-md-6" id="19">
                     Funciona la pantalla
                     <center>{!!Form::select('pantallat', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>

                   <div class="form-group col-md-6" id="20">
                     ¿Funciona touch?
                     <center>{!!Form::select('toucht', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-6" id="21">
                     ¿Funciona camara delantera?
                     <center>{!!Form::select('camaradt', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-6" id="22">
                     ¿Funciona camara trasera?
                     <center>{!!Form::select('camaratt', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-6" id="23">
                     ¿Funciona altavoz?
                     <center>{!!Form::select('altavozt', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-6" id="24">
                     ¿Funciona jack de audio?
                     <center>{!!Form::select('jackt', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-6" id="25">
                     ¿Funciona WIFI?
                     <center>{!!Form::select('wifit', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-6" id="26">
                     ¿Funciona sensor de proximidad?
                     <center>{!!Form::select('sensort', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-6" id="27">
                     ¿Funciona bluetooth?
                     <center>{!!Form::select('blut', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>
                   <div class="form-group col-md-6" id="28">
                     ¿Funciona bateria?
                     <center>{!!Form::select('bateriat', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>

                   <div class="form-group col-md-6" id="28">
                     ¿Datos Moviles?
                     <center>{!!Form::select('datosmt', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>

                   <div class="form-group col-md-6" id="28">
                     ¿Funciona centro de carga?
                     <center>{!!Form::select('ccargat', array('NO SE'=> 'NO SE', 'SI' => 'SI', 'NO' => 'NO'), 'NO SE')!!}
                   </div>

                   <div class="form-group col-md-12" id="40">
                     ¿Que problema presenta el equipo?{!!Form::text('problemaclientet',null,['class'=>'form-control','placeholder'=>''])!!}

                   </div>
                   <div class="form-group col-md-12" id="30">
                     ¿Que solucion desea?
                     <center>{!!Form::text('soluciont',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>
                   
                   <div class="form-group col-md-12" id="42">
                     <h4>Diagnostico de Recepción:</h4>
                     {!!Form::textarea('diagnostico1t',null,['class'=>'form-control','placeholder'=>'DIAGNOSTICO DE RECEPCIÓN'])!!}
                   </div>

                   <div class="form-group col-md-12" id="43">
                     <h4>Comunicación Interna (Observaciones y comentarios del equipo(s)):</h4>
                     {!!Form::textarea('comunicaciont',null,['class'=>'form-control','placeholder'=>'¿Que deseas que sepa tu compañero?'])!!}
                   </div>
                   <div class="form-group col-md-12" id="44">
                     <h4>Concepto y precio de la reparación:</h4>
                     {!!Form::textarea('diagnostico2t',null,['class'=>'form-control','placeholder'=>''])!!}
                   </div>


                   <div class="form-group col-md-12" id="45">
                     {!!Form::label('Status','Status:')!!}
                     {!!Form::select('status_idt',$status)!!}
                   </div>

                   <div class="form-group col-md-12" id="46">
                     {!!Form::label('tecnico','Tecnico Asignado:')!!}
                     {!!Form::select('tecnico_idt',$user)!!}
                   </div> 


                 </div>

                 <div class="modal-footer">
                 

                </div>
              </div>

            </div>
          </div>
