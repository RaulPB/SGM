<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-up">

   

    <div class="modal-dialog modal-lg"  style="z-index: 1100;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">cerrar (X)</span>
                </button>
                <h4 class="modal-title" align="center">Registro de datos MOVIL</h4>
            </div>
            <div class="modal-body">
          <div class="form-group col-md-4" id="uno" >
             Producto del cliente:{!!Form::text('producto',null,['class'=>'form-control','id'=>'productor','placeholder'=>'5.-Pestoy'])!!}
           </div>

           <div class="form-group col-md-4" id="2" >
             Marca del producto:{!!Form::text('marca',null,['class'=>'form-control','placeholder'=>'6.-Marca del Producto'])!!}
           </div>


            <div class="form-group col-md-4" id="3">
             Modelo del Producto:{!!Form::text('modelo',null,['class'=>'form-control','placeholder'=>'7.-Modelo del Producto'])!!}
           </div>
           <div class="form-group col-md-4" id="4">
             Tipo Producto:{!!Form::text('tipo',null,['class'=>'form-control','placeholder'=>'8.-Tipo Producto'])!!}
           </div>
           <div class="form-group col-md-4" id="5">
             Color Producto:{!!Form::text('color',null,['class'=>'form-control','placeholder'=>'9.-Color Producto'])!!}
           </div>
           <div class="form-group col-md-4" id="6">
             Capacidad Producto:{!!Form::text('capacidad',null,['class'=>'form-control','placeholder'=>'10.-Capacidad Producto'])!!}
           </div>
           <div class="form-group col-md-4" id="7">
             Serie Producto:{!!Form::text('serie',null,['class'=>'form-control','placeholder'=>'11.-Serie Producto'])!!}
           </div>
           <div class="form-group col-md-4" id="8">
             IMEI Producto:{!!Form::text('imei',null,['class'=>'form-control','placeholder'=>'12.-IMEI Producto'])!!}
           </div>
           <div class="form-group col-md-4" id="9">
             Contraseña Producto:{!!Form::text('contraseña',null,['class'=>'form-control','placeholder'=>'13.-Contraseña Producto'])!!}
           </div>
           <div class="form-group col-md-4" id="10">
             Compañia Producto:{!!Form::text('compañia',null,['class'=>'form-control','placeholder'=>'14.-Compañia Producto'])!!}
           </div>
           <div class="form-group col-md-4" id="11">
             ¿Alguien intento reparar el equipo antes?{!!Form::text('reparado',null,['class'=>'form-control','placeholder'=>'15.-¿Alguien intento reparar el equipo antes?'])!!}
           </div>
           <div class="form-group col-md-4" id="12">
             ¿Estuvo en contacto con agua?,¿tipo?{!!Form::text('agua',null,['class'=>'form-control','placeholder'=>'16.-¿Estuvo en contacto con agua?,¿tipo?'])!!}
           </div>
           <div class="form-group col-md-4" id="13">
             ¿Ingresa correctamente al sistema?{!!Form::text('ingresoso',null,['class'=>'form-control','placeholder'=>'17.-¿Ingresa correctamente al sistema?'])!!}
           </div>
           <div class="form-group col-md-4" id="14">
             ¿Enciende?{!!Form::text('enciende',null,['class'=>'form-control','placeholder'=>'18.-¿Enciende?'])!!}
           </div>
           <div class="form-group col-md-4" id="15">
             ¿Funciona botón de encendido?{!!Form::text('benciende',null,['class'=>'form-control','placeholder'=>'19.-¿Funciona botón de encendido?'])!!}
           </div>
           <div class="form-group col-md-4" id="16">
             ¿Funciona botón de volumen?{!!Form::text('bvolumen',null,['class'=>'form-control','placeholder'=>'20.-¿Funciona botón de volumen?'])!!}
           </div>
           <div class="form-group col-md-4" id="16">
             ¿Funciona botón vibrador?{!!Form::text('bvibrador',null,['class'=>'form-control','placeholder'=>'21.-¿Funciona botón vibrador?'])!!}
           </div>
           <div class="form-group col-md-4" id="17">
             ¿Funciona pantalla?{!!Form::text('pantalla',null,['class'=>'form-control','placeholder'=>'22.-¿Funciona pantalla'])!!}
           </div>
           <div class="form-group col-md-4" id="18">
             ¿Funciona touch?{!!Form::text('touch',null,['class'=>'form-control','placeholder'=>'23.-¿Funciona touch'])!!}
           </div>

           <div class="form-group col-md-4" id="19">
             ¿Funciona display?{!!Form::text('display',null,['class'=>'form-control','placeholder'=>'24.-¿Funciona display'])!!}
           </div>
           <div class="form-group col-md-4" id="20">
             ¿Funciona camara trasera?{!!Form::text('ctrasera',null,['class'=>'form-control','placeholder'=>'25.-¿Funciona camara trasera'])!!}
           </div>
           <div class="form-group col-md-4" id="21">
             ¿Funciona camara frontal?{!!Form::text('cfrontal',null,['class'=>'form-control','placeholder'=>'26.-¿Funciona camara frontal'])!!}
           </div>
           <div class="form-group col-md-4" id="22">
             ¿Funciona centro de carga?{!!Form::text('ccarga',null,['class'=>'form-control','placeholder'=>'27.-¿Funciona centro de carga'])!!}
           </div>
           <div class="form-group col-md-4" id="23">
             ¿Funciona altavoz?{!!Form::text('altavoz',null,['class'=>'form-control','placeholder'=>'28.-¿Funciona altavoz'])!!}
           </div>
           <div class="form-group col-md-4" id="24">
             ¿Funciona microfono?{!!Form::text('microfono',null,['class'=>'form-control','placeholder'=>'29.-¿Funciona microfono'])!!}
           </div>
           <div class="form-group col-md-4" id="25">
             ¿Funciona auricular?{!!Form::text('auricular',null,['class'=>'form-control','placeholder'=>'30.-¿Funciona auricular'])!!}
           </div>
           <div class="form-group col-md-4" id="26">
             ¿Funciona bocina externa?{!!Form::text('boexterna',null,['class'=>'form-control','placeholder'=>'31.-¿Funciona bocina externa'])!!}
           </div>
           <div class="form-group col-md-4" id="27">
             ¿Funciona jack de audio?{!!Form::text('jack',null,['class'=>'form-control','placeholder'=>'32.-¿Funciona jack de audio'])!!}
           </div>
           <div class="form-group col-md-4" id="28">
             ¿Funciona wifi?{!!Form::text('wifi',null,['class'=>'form-control','placeholder'=>'33.-¿Funciona wifi'])!!}
           </div>
           <div class="form-group col-md-4" id="29">
             ¿Funciona bluetooth?{!!Form::text('bluetooth',null,['class'=>'form-control','placeholder'=>'34.-¿Funciona bluetooth'])!!}
           </div>
           <div class="form-group col-md-4" id="30">
             ¿Datos móviles?{!!Form::text('datosm',null,['class'=>'form-control','placeholder'=>'35.-¿Datos móviles?'])!!}
           </div>
           <div class="form-group col-md-4" id="31">
             ¿Funciona bateria?{!!Form::text('bateria',null,['class'=>'form-control','placeholder'=>'36.-¿Funciona bateria?'])!!}
           </div>
           <div class="form-group col-md-4" id="32">
             ¿Funciona porta Sim?{!!Form::text('portasim',null,['class'=>'form-control','placeholder'=>'37.-¿Funciona porta Sim?'])!!}
           </div>
           <div class="form-group col-md-4" id="33">
             ¿Funciona SIM?{!!Form::text('sim',null,['class'=>'form-control','placeholder'=>'38.- ¿Funciona SIM?'])!!}
           </div>
           <div class="form-group col-md-4" id="34">
             ¿Funciona boton home?{!!Form::text('bhome',null,['class'=>'form-control','placeholder'=>'39.- ¿Funciona boton home?'])!!}
           </div>
           <div class="form-group col-md-4" id="35">
             ¿Funciona Touch ID?{!!Form::text('touchid',null,['class'=>'form-control','placeholder'=>'40.- ¿Funciona Touch ID?'])!!}
           </div>
           <div class="form-group col-md-4" id="36">
             ¿Funciona sensor de proximidad?{!!Form::text('sensorp',null,['class'=>'form-control','placeholder'=>'41.- ¿Funciona sensor de proximidad?'])!!}
           </div>
           <div class="form-group col-md-4" id="37">
             ¿Golpes en carcasa?{!!Form::text('carcasa',null,['class'=>'form-control','placeholder'=>'42.- ¿Golpes en carcasa?'])!!}
           </div>
           
           <div class="form-group col-md-4" id="38">
             ¿Funciona Teclado?{!!Form::text('teclado',null,['class'=>'form-control','placeholder'=>'43.- ¿Funciona Teclado?'])!!}
           </div>
           <div class="form-group col-md-4" id="39">
             ¿Tiene Señal?{!!Form::text('señal',null,['class'=>'form-control','placeholder'=>'44.- ¿Tiene Señal?'])!!}
           </div>
           <div class="form-group col-md-4" id="40">
             ¿Que problema presenta el equipo?{!!Form::text('problemacliente',null,['class'=>'form-control','placeholder'=>'45.- ¿Que problema presenta el equipo?'])!!}
           </div>
           <div class="form-group col-md-4" id="41">
             ¿Que solución desea?{!!Form::text('solucion1',null,['class'=>'form-control','placeholder'=>'46.- ¿Que solución desea?'])!!}
           </div>
           <div class="form-group col-md-12" id="42">
             <h4>Diagnostico de Recepción:</h4>
             {!!Form::textarea('diagnostico1',null,['class'=>'form-control','placeholder'=>'47.-DIAGNOSTICO DE RECEPCIÓN'])!!}
           </div>

           <div class="form-group col-md-12" id="43">
             <h4>Comunicación Interna (Observaciones y comentarios del equipo(s)):</h4>
             {!!Form::textarea('comunicacion',null,['class'=>'form-control','placeholder'=>'¿Que deseas que sepa tu compañero?'])!!}
           </div>
           <div class="form-group col-md-12" id="44">
             <h4>Concepto y precio de la reparación:</h4>
             {!!Form::textarea('diagnostico2',null,['class'=>'form-control','placeholder'=>''])!!}
           </div>


           <div class="form-group col-md-12" id="45">
             {!!Form::label('Status','Status:')!!}
             {!!Form::select('status_id',$status)!!}
           </div>

           <div class="form-group col-md-12" id="46">
             {!!Form::label('tecnico','Tecnico Asignado:')!!}
             {!!Form::select('tecnico_id',$user)!!}
           </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class= "btn btn-default" data-dismiss="modal">Continuar   </button>
                
            </div>
        </div>
    </div>
 
