      <!DOCTYPE html>
      <html lang="en">

      <head>
        <title>SGM: Sistema de gestión multiplataforma</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        

 

        {!!Html::style('css/bootstrap.min.css')!!}
        {!!Html::style('css/metisMenu.min.css')!!}
        {!!Html::style('css/sb-admin-2.css')!!}
        {!!Html::style('css/font-awesome.min.css')!!}

      </head>

      <body>







        <script>
         /* var progreso = 0;
          var idIterval = setInterval(function(){
          // Aumento en 10 el progeso
          progreso +=10;
          $('#id').css('width', progreso + '%');
           document.getElementById('label').innerHTML = progreso;

        //Si llegó a 100 elimino el interval
        if(progreso == 90){
         clearInterval(idIterval);
         $('#id').hide();
       }
     },90);*/
   </script>


   <script src="js/sweetalert.min.js"></script>
   <script >
          @if (\Session::has('msg')) //ESTA ALERTA ES PARA TRANSFERENCIAS DE INVENTARIO

          swal(
            "{!!Session::get('msg')!!}",
            '',
            'success'
            )
          @endif

           @if (Session::has('notify')) //ESTA ALERTA ES PARA CUALQUIER OPERACION
           //swal("Texto del mensaje");
           swal(
            "{!!Session::get('notify')!!}",
            '',
            'info'
            )
           @endif

            @if (Session::has('msg1')) //ESTA ALERTA ES PARA CUALQUIER OPERACION
           //swal("Texto del mensaje");
           swal(
            "{!!Session::get('msg1')!!}",
            '',
            'error'
            )
           @endif

         </script>




         @if (\Session::has('success'))
         <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <ul>
            <li>{!! \Session::get('success') !!}</li>
          </ul>
        </div>
        @endif

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: ">


          <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="/admin">Sistema de Gestion Multiplataforma</a>
          </div>


          <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
               <i class="fa fa-coffee"></i> {!!Auth::user()->name!!}  <i class="fa fa-caret-down"></i>
             </a>
             <ul class="dropdown-menu dropdown-user">
              <li class="divider"></li>
              <li><a href="/acerca/show"><i class="fa fa-book"></i> Politicas</a>
              </li>
              <li><a href="/acerca"><i class="fa fa-apple"></i> Acerca de</a>
              </li>
              <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
              </li>
            </ul>
          </li>
        </ul>



        <?
        use SGM\Serv;
        use SGM\Salidas;
        $usuario_id = DB::table('users')->where('name', '=', Auth::user()->name)->pluck('id');
          $sucuserlog = DB::table('users')->where('name', '=', Auth::user()->name)->pluck('sucursal_id'); //sucursaldel usuario logueado
          $perfiluserlog =  DB::table('users')->where('name', '=', Auth::user()->name)->pluck('perfil_id');// sacamos el perfil del usuario logueado para compararlo


          if ($perfiluserlog == 1 ) { //CON ESTE METODO HACEMOS QUE EL JEFE DE UNIDAD PUEDA REVISAR SUS PENDIENTES DE ORDENES
            $servicios = DB::table('servs')
            ->whereIn('status_id', [1, 16])
            ->where('sucursal',$sucuserlog)
            ->get();
           $y = 0;//ECHO $servicios;
           $x = 0;//ECHO $servicios;
         }else{
          $servicios = DB::table('servs')
          ->whereIn('status_id', [1, 16])
          ->where('tecnico_id',$usuario_id)
          ->get();
           $y = 0;//ECHO $servicios;
           $x = 0;//ECHO $servicios;
         }


         if ($perfiluserlog == 10 ) { //CON ESTE METODO HACEMOS QUE EL SUPER-USER PUEDA REVISAR SUS PENDIENTES DE ORDENES
          $servicios = DB::table('servs')->where('status_id', 1)->orwhere('status_id', 16)->get();
              //$y= 0;//ECHO $servicios;
              //$x = 0;//ECHO $servicios;


        }


           if ($perfiluserlog == 1 || $perfiluserlog == 5) { //CON ESTE METODO EL JEFE DE UNIDAD O COMPRAS/ALMACEN PUEDE REVISAR SUS TRANSFERENCIAS
            //vamos a optener las notificaciones de transferencias realizadas y que se muestren solo a los responsables
            //aqui el "servicio_id" ES EL ID DE LA SUCURSAL
            $transfer = Salidas::where('servicio_id',"=", $sucuserlog)->where("status", "=", "Enviado")->get();
            $zz = 0;
            $zz1 = 0;

           }else{// solo mantiene viva la variable,es lo unico
            $transfer = Salidas::where('servicio_id',"=", $sucuserlog)->where("status", "=", "NO")->get();
            $zz = 0;
            $zz1 = 0;
          }


           if ($perfiluserlog == 10) { //CON ESTE METODO EL SUPER-USER PUEDE REVISAR LAS TRANSFERENCIAS PENDIENTES DE TODAS LAS SUCURSALES.
          //aqui el "servicio_id" ES EL ID DE LA SUCURSAL
            $transfer = Salidas::where("status", "=", "Enviado")->get();
            $zz = 0;
            $zz1 = 0;

          }


          ?>  

          @foreach($servicios as $cli)
          <? $y = $y+1;       
          ?>
          @endforeach

          @foreach($transfer as $tran)
          <? $zz = $zz+1;  
          ?>
          @endforeach





          @if ($y <> 0)
          <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-stethoscope"></i>
                <span class="badge"><? echo $y ?></span></i>
                <i class="fa fa-exclamation"></i>
              </a>
              <ul class="dropdown-menu dropdown-user">
                @foreach($servicios as $clis)
                <li>
                  <? $x = $x+1; 
                  $Z= $clis -> sucursal;
                  $idsucur = DB::table('sucursals')->where('id', '=', $Z)->pluck('nameS');
                  ?>
                  <i class=""> {!!link_to_route('tecnico.edit', $title = $x.".- Orden por atender: ". $clis->id."  / Sucursal: ".$idsucur .'  /  Vence: '. $clis->fechaentrega, $parameters = $clis->id, $attributes = ['class'=>'btn'])!!}
                  </i>
                </li>
                @endforeach

              </ul>
            </li>
          </ul>
          @endif

          @if ($zz <> 0 )
          <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-archive"></i>
                <span class="badge"><? echo $zz ?></span></i>
                <i class="fa fa-exclamation"></i>
              </a>
              <ul class="dropdown-menu dropdown-user">
                @foreach($transfer as $tran)
                <li>
                  <? $zz1 = $zz1+1; ?>
                  <i class=""> {!!link_to_route('salida.edit', $title = $zz1.".- RECIBIR ID: $tran->id ".". Producto: ". $tran->producto->modelo."; Cantidad".$tran->cantidad, $parameters = $tran->id, $attributes = ['class'=>'btn'])!!}</i>
                </li>
                @endforeach

              </ul>
            </li>
          </ul>
          @endif

          @if ($zz == 0 )
          <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">

              <ul class="dropdown-menu dropdown-user">

                <li>
                  <a href="#"><i class="fa fa-exclamation-circle"> SIN NOTIFICACIONES </i></a>
                </li>
              </ul>
            </li>
          </ul>
          @endif


          @if ($y == 0)
          <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">

              <ul class="dropdown-menu dropdown-user">

                <li>
                  <a href="#"><i class="fa fa-exclamation-circle"> SIN NOTIFICACIONES </i></a>
                </li>
              </ul>
            </li>
          </ul>
          @endif




          @if(Auth::user()->perfil_id == '10')  <!--ESTE PERFIL ES DE SUPER USUARIO. VE TODO DE TODOS, PERO TU NO xD-->
          <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
              <ul class="nav" id="side-menu">
                <li>
                  <a href="#"><i class="fa fa-users fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="{!!URL::to('/usuario/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                    </li>
                    <li>
                      <a href="/usuario"><i class='fa fa-list-ol fa-fw'></i> Usuarios</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a href="#"><i class="fa fa-building fa-fw"></i> Sucursal<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="/sucursal/create"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                    </li>
                    <li>
                      <a href="/sucursal/"><i class='fa fa-list-ol fa-fw'></i> Sucursales</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a href="#"><i class="fa fa-certificate"></i> Administración de Garantias<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="/garantia/create"><i class='fa fa-plus fa-fw'></i> Agregar garantia</a>
                    </li>
                    <li>
                      <a href="/garantia/"><i class='fa fa-list-ol fa-fw'></i> Garantias</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a href="#"><i class="fa fa-dashboard fa-fw"></i> Status<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="/status/"><i class='fa fa-list-ol fa-fw'></i> Status</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="/constru"><i class="fa fa-bullhorn fa-fw"></i> Mensajes/Promociones<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="/mensajes"><i class='fa fa-plus fa-fw'></i> Crear</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a href="#"><i class="fa fa-bank"></i> Politicas de servicio en formatos<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="/politica"><i class='fa fa-bar-chart'></i>Editar formatos</a>
                    </li>
                  </ul>
                </li> 


                <li>
                  <a href="#"><i class="fa fa-pie-chart"></i> Reportes & Estadisticas<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="/pdf"><i class='fa fa-bar-chart'></i>Reporte de ventas</a>
                    </li>
                    <li>
                      <a href="/saber"><i class='fa fa-bar-chart'></i> Reporte: ¿Como se entero de nosotros?</a>
                    </li>
                    <li>
                      <a href="/horas"><i class='fa fa-bar-chart'></i> Reporte: Mayor afluencia de clientes en el dia</a>
                    </li>
                    <li>
                      <a href="/asistencia"><i class='fa fa-stack-overflow'></i> Reporte: historico de servicios por  nombre cliente </a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a href="#"><i class="fa fa-ambulance"></i> Servicios<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">

                    <li>
                      <a href="#">+ <i class='fa fa-cogs'></i> Ordenes de servicio</a>
                      <ul class="nav nav-third-level">
                        <li>
                          <a href="{!!URL::to('/servicio/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar Orden de servicio</a>
                        </li>
                        <li>
                          <a href="{!!URL::to('/servicio')!!}"><i class='fa fa-pencil-square fa-fw'></i> Ordenes de servicio no entregadas</a>
                        </li>
                        <li>
                          <a href="{!!URL::to('servicio/show')!!}"><i class='fa fa-thumbs-o-up'></i> Ordenes de servicio entregadas y/o canceladas</a>
                        </li>
                        <li>
                          <a href="#"> <i class='fa fa-file-text-o'></i> Notas de venta</a>
                          <ul class="nav nav-fourth-level">
                            <a href="{!!URL::to('/blanco/create')!!}"><i class='fa fa-file-text'></i> Nota de venta vacia</a>
                          </ul>
                          <ul class="nav nav-fourth-level">
                            <a href="{!!URL::to('/reimpn')!!}"><i class='fa fa-print'></i> Reimprimir nota de venta </a>
                          </ul>
                        </li>
                      </ul>
                    </li>

                    <li>
                      <a href="#">+ <i class='fa fa-camera'></i>Evidencias Fotograficas</a>
                      <ul class="nav nav-third-level">
                        <li>
                          <a href="{!!URL::to('/archivo/create')!!}"><i class='fa fa-file-picture-o'></i> Agregar Evidencias Fotograficas</a>
                        </li>
                        <li>
                          <a href="{!!URL::to('/archivo')!!}"><i class='fa fa-folder-open-o'></i> Buscar Evidencias Fotograficas</a>
                        </li>
                      </ul>
                    </li>


                    <li>
                      <a href="{!!URL::to('/precio')!!}">+ <i class='fa fa-money'></i> Lista de precios al público</a>
                    </li>

                    <li>
                      <a href="#">+ <i class='fa fa-bicycle'></i> Solicitar recolección de equipo</a>
                      <ul class="nav nav-third-level">
                        <li>
                          <a href="/envre/create"><i class='fa fa-star-o'></i> Nueva Recolección</a>
                        </li>
                        <li>
                          <a href="/envre/"><i class='fa fa-sort-amount-desc'></i> Recolecciones</a>
                        </li>
                      </ul>
                    </li>
                      <!--     <li>
                      <a href="{!!URL::to('servicio/destroy')!!}"><i class='fa fa-ban'></i> Ordenes de servicio canceladas</a>
                    </li>-->
                  </ul>
                </li>


                <li>
                  <a href="#"><i class="fa fa-sign-out"></i> Gastos<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="/gasto/create"><i class='fa fa-plus fa-fw'></i>Ingresar Gasto</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a href="#"> <i class='fa fa-cc-amex'></i> Clientes</a>
                  <ul class="nav nav-third-level">
                    <li>
                      <a href="/clientes"><i class='fa fa-bars'></i> Listado de Clientes</a>
                    </li>
                    <li>
                      <a href="/clientes/create">+<i class='fa fa-address-card-o'></i> Nuevo Cliente</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a href="#"><i class="fa fa-ambulance"></i> Tecnico<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>

                      <a href="<?php
                      $dato="/tecnico/?ids=";
                      $id=Auth::user()->id; //IMPORTANTE ESTO LO RECUPERAREMOS CON: Auth::user()->id == '1'
                      $link_address= $dato.$id;
                      echo $link_address;?>"><i class='fa fa-pencil-square fa-fw'></i> Ordenes de servicio pendientes</a>
                    </li>
                    <ul class="nav nav-third-level">
                      <li>
                        <a href="{!!URL::to('/archivo/create')!!}"><i class='fa fa-file-picture-o'></i> Agregar Evidencias Fotograficas</a>
                      </li>
                      <li>
                        <a href="{!!URL::to('/archivo')!!}"><i class='fa fa-folder-open-o'></i> Buscar Evidencias Fotograficas</a>
                      </li>

                    </ul>
                    <li>
                      <a href="{!!URL::to('/compras/create')!!}"><i class="fa fa-credit-card"></i> Solicitar refacción</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a href="#"><i class="fa fa-credit-card"></i> Compras<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="/compras"><i class='fa fa-archive'></i> Ordenes de compra de refacción</a>
                    </li>
                    <li>
                      <a href="/proveedor/create"><i class='fa fa-group'></i> Alta de proveedores</a>
                    </li>
                    <li>
                      <a href="/proveedor"><i class='fa fa-bars'></i> Lista de proveedores</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a href="#"><i class="fa fa-archive"></i> Inventario<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="/producto2/"><i class='fa fa-cubes'></i> Inventario</a>
                    </li>
                    <li>
                      <a href="/producto2/create"><i class='fa fa-arrow-down'></i> Registrar producto en inventario</a>
                    </li>
                    <li>
                      <a href="/salida2/create"><i class='fa fa-arrow-up'></i> Transferir a sucursal</a>
                    </li>

                    <li>
                      <a href="/salida2"><i class='fa fa-file-text'></i> Historico de Transferencias</a>
                    </li>
                    <li>
                      <a href="#"><i class='fa fa-sitemap'></i> Categorias de productos</a>
                      <ul class="nav nav-third-level">
                        <li>
                          <a href="/categoria/create"><i class='fa fa-star-o'></i> Nueva categoria de inventario</a>
                        </li>
                        <li>
                          <a href="/categoria"><i class='fa fa-sort-amount-desc'></i> Categoria de inventario</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>

                <li>
                  <a href="#"><i class="fa fa-bicycle"></i> Mensajeria<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="<?php
                      $dato="/compram/?idss=";
                      $id=Auth::user()->id; //IMPORTANTE ESTO LO RECUPERAREMOS CON: Auth::user()->id == '1' Para mensajero
                      $link_address= $dato.$id;
                      echo $link_address;?>"><i class='fa fa-credit-card'></i> Compra de refacción</a>
                    </li>
                    <li>
                      <a href="/envre/show"><i class='fa fa-bicycle'></i> Recoleccion de equipo</a>
                    </li>
                  </ul>
                </li>

                @endif



                @if(Auth::user()->perfil_id == '1')
                <div class="navbar-default sidebar" role="navigation">
                  <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                          <li>
                            <a href="{!!URL::to('/usuario/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                          </li>
                          <li>
                            <a href="/usuario"><i class='fa fa-list-ol fa-fw'></i> Usuarios</a>
                          </li>
                        </ul>
                      </li>


                      <li>
                        <a href="#"><i class="fa fa-pie-chart"></i> Reportes & Estadisticas<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                          <li>
                            <a href="/pdf"><i class='fa fa-bar-chart'></i>Reporte de ventas</a>
                          </li>
                          <li>
                            <a href="/saber"><i class='fa fa-bar-chart'></i> Reporte: ¿Como se entero de nosotros?</a>
                          </li>
                          <li>
                            <a href="/horas"><i class='fa fa-bar-chart'></i> Reporte: Mayor afluencia de clientes en el dia</a>
                          </li>
                          <li>
                            <a href="/asistencia"><i class='fa fa-stack-overflow'></i> Reporte: historico de servicios por  nombre cliente </a>
                          </li>
                        </ul>
                      </li>

                      <li>
                        <a href="#"><i class="fa fa-ambulance"></i> Servicios<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                          <li>
                            <a href="#">+ <i class='fa fa-cogs'></i> Ordenes de servicio</a>
                            <ul class="nav nav-third-level">
                              <li>
                                <a href="{!!URL::to('/servicio/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar Orden de servicio</a>
                              </li>
                              <li>
                                <a href="{!!URL::to('/servicio')!!}"><i class='fa fa-pencil-square fa-fw'></i> Ordenes de servicio no entregadas</a>
                              </li>
                              <li>
                                <a href="{!!URL::to('servicio/show')!!}"><i class='fa fa-thumbs-o-up'></i> Ordenes de servicio entregadas y/o canceladas</a>
                              </li>
                              <li>
                                <a href="#"> <i class='fa fa-file-text-o'></i> Notas de venta</a>
                                <ul class="nav nav-fourth-level">
                                  <a href="{!!URL::to('/blanco/create')!!}"><i class='fa fa-file-text'></i> Nota de venta vacia</a>
                                </ul>
                                <ul class="nav nav-fourth-level">
                                  <a href="{!!URL::to('/reimpn')!!}"><i class='fa fa-print'></i> Reimprimir nota de venta </a>
                                </ul>
                              </li>
                            </ul>
                          </li>

                          <li>
                            <a href="#">+ <i class='fa fa-camera'></i>Evidencias Fotograficas</a>
                            <ul class="nav nav-third-level">
                              <li>
                                <a href="{!!URL::to('/archivo/create')!!}"><i class='fa fa-file-picture-o'></i> Agregar Evidencias Fotograficas</a>
                              </li>
                              <li>
                                <a href="{!!URL::to('/archivo')!!}"><i class='fa fa-folder-open-o'></i> Buscar Evidencias Fotograficas</a>
                              </li>
                            </ul>
                          </li>


                          <li>
                            <a href="{!!URL::to('/precio')!!}">+ <i class='fa fa-money'></i> Lista de precios al público</a>
                          </li>

                          <li>
                            <a href="#">+ <i class='fa fa-bicycle'></i> Solicitar recolección de equipo</a>
                            <ul class="nav nav-third-level">
                              <li>
                                <a href="/envre/create"><i class='fa fa-star-o'></i> Nueva Recolección</a>
                              </li>
                              <li>
                                <a href="/envre/"><i class='fa fa-sort-amount-desc'></i> Recolecciones</a>
                              </li>
                            </ul>
                          </li>
                      <!--     <li>
                      <a href="{!!URL::to('servicio/destroy')!!}"><i class='fa fa-ban'></i> Ordenes de servicio canceladas</a>
                    </li>-->
                  </ul>
                </li>


                <li>
                  <a href="#"><i class="fa fa-sign-out"></i> Gastos<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="/gasto/create"><i class='fa fa-plus fa-fw'></i>Ingresar Gasto</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a href="#"> <i class='fa fa-cc-amex'></i> Clientes</a>
                  <ul class="nav nav-third-level">
                    <li>
                      <a href="/clientes"><i class='fa fa-bars'></i> Listado de Clientes</a>
                    </li>
                    <li>
                      <a href="/clientes/create">+<i class='fa fa-address-card-o'></i> Nuevo Cliente</a>
                    </li>
                  </ul>
                </li>


                <li>
                  <a href="#"><i class="fa fa-credit-card"></i> Compras<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="/compras"><i class='fa fa-archive'></i> Ordenes de compra de refacción</a>
                    </li>
                    <li>
                      <a href="/proveedor/create"><i class='fa fa-group'></i> Alta de proveedores</a>
                    </li>
                    <li>
                      <a href="/proveedor"><i class='fa fa-bars'></i> Lista de proveedores</a>
                    </li>
                  </ul>
                </li>

                <li>
                  <a href="#"><i class="fa fa-archive"></i> Inventario<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="/producto/"><i class='fa fa-cubes'></i> Inventario</a>
                    </li>
                    <li>
                      <a href="/producto/create"><i class='fa fa-arrow-down'></i> Registrar producto en inventario</a>
                    </li>
                    <li>
                      <a href="/salida/create"><i class='fa fa-arrow-up'></i> Transferir a sucursal</a>
                    </li>

                    <li>
                      <a href="/salida"><i class='fa fa-file-text'></i> Historico de Transferencias</a>
                    </li>
                    <li>
                      <a href="#"><i class='fa fa-sitemap'></i> Categorias de productos</a>
                      <ul class="nav nav-third-level">
                        <li>
                          <a href="/categoria/create"><i class='fa fa-star-o'></i> Nueva categoria de inventario</a>
                        </li>
                        <li>
                          <a href="/categoria"><i class='fa fa-sort-amount-desc'></i> Categoria de inventario</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>

                <li>
                  <a href="#"><i class="fa fa-bicycle"></i> Mensajeria<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="<?php
                      $dato="/compram/?idss=";
                      $id=Auth::user()->id; //IMPORTANTE ESTO LO RECUPERAREMOS CON: Auth::user()->id == '1' Para mensajero
                      $link_address= $dato.$id;
                      echo $link_address;?>"><i class='fa fa-credit-card'></i> Compra de refacción</a>
                    </li>
                    <li>
                      <a href="/envre/show"><i class='fa fa-bicycle'></i> Recoleccion de equipo</a>
                    </li>
                  </ul>
                </li>

                @endif

                <?php if(Auth::user()->perfil_id == '2'): ?>
                  <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                      <ul class="nav" id="side-menu">

                        <li>
                          <a href="#"><i class="fa fa-ambulance"></i> Servicios<span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">

                            <li>
                              <a href="#">+ <i class='fa fa-cogs'></i> Ordenes de servicio</a>
                              <ul class="nav nav-third-level">
                                <li>
                                  <a href="{!!URL::to('/servicio/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar Orden de servicio</a>
                                </li>
                                <li>
                                  <a href="{!!URL::to('/servicio')!!}"><i class='fa fa-pencil-square fa-fw'></i> Ordenes de servicio no entregadas</a>
                                </li>

                                <li>
                                  <a href="{!!URL::to('servicio/show')!!}"><i class='fa fa-thumbs-o-up'></i> Ordenes de servicio entregadas y/o canceladas</a>
                                </li>
                                <li>
                                  <a href="#"> <i class='fa fa-file-text-o'></i> Notas de venta</a>
                                  <ul class="nav nav-fourth-level">
                                    <a href="{!!URL::to('/blanco/create')!!}"><i class='fa fa-file-text'></i> Nota de venta vacia</a>
                                  </ul>
                                  <ul class="nav nav-fourth-level">
                                    <a href="{!!URL::to('/reimpn')!!}"><i class='fa fa-print'></i> Reimprimir nota de venta </a>
                                  </ul>
                                </li>
                              </ul>
                            </li>

                            <li>
                              <a href="#">+ <i class='fa fa-camera'></i>Evidencias Fotograficas</a>
                              <ul class="nav nav-third-level">
                                <li>
                                  <a href="{!!URL::to('/archivo/create')!!}"><i class='fa fa-file-picture-o'></i> Agregar Evidencias Fotograficas</a>
                                </li>
                                <li>
                                  <a href="{!!URL::to('/archivo')!!}"><i class='fa fa-folder-open-o'></i> Buscar Evidencias Fotograficas</a>
                                </li>
                              </ul>
                            </li>


                            <li>
                              <a href="{!!URL::to('/precio')!!}">+ <i class='fa fa-money'></i> Lista de precios al público</a>
                            </li>

                            <li>
                              <a href="#">+ <i class='fa fa-bicycle'></i> Solicitar recolección de equipo</a>
                              <ul class="nav nav-third-level">
                                <li>
                                  <a href="/envre/create"><i class='fa fa-star-o'></i> Nueva Recolección</a>
                                </li>
                                <li>
                                  <a href="/envre/"><i class='fa fa-sort-amount-desc'></i> Recolecciones</a>
                                </li>
                              </ul>
                            </li>
                          <!--     <li>
                          <a href="{!!URL::to('servicio/destroy')!!}"><i class='fa fa-ban'></i> Ordenes de servicio canceladas</a>
                        </li>-->
                      </ul>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-sign-out"></i> Gastos<span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                        <li>
                          <a href="/gasto/create"><i class='fa fa-plus fa-fw'></i>Ingresar Gasto</a>
                        </li>
                      </ul>
                    </li> 

                    <!--     <li>
                    <a href="{!!URL::to('servicio/destroy')!!}"><i class='fa fa-ban'></i> Ordenes de servicio canceladas</a>
                  </li>-->
                </ul>
              </li>

            <?php endif ?>

            <?php if(Auth::user()->perfil_id == '3'): ?>
              <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                  <ul class="nav" id="side-menu">


                    <li>
                      <a href="#"><i class="fa fa-ambulance"></i> Tecnico<span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                        <li>

                          <a href="<?php
                          $dato="/tecnico/?ids=";
                          $id= Auth::user()->id; //IMPORTANTE ESTO LO RECUPERAREMOS CON: Auth::user()->id == '1'
                          $link_address= $dato.$id;
                          echo $link_address;?>"><i class='fa fa-pencil-square fa-fw'></i> Ordenes de servicio pendientes</a>
                        </li>
                        <ul class="nav nav-third-level">
                          <li>
                            <a href="{!!URL::to('/archivo/create')!!}"><i class='fa fa-file-picture-o'></i> Agregar Evidencias Fotograficas</a>
                          </li>
                          <li>
                            <a href="{!!URL::to('/archivo')!!}"><i class='fa fa-folder-open-o'></i> Buscar Evidencias Fotograficas</a>
                          </li>

                        </ul>
                        <li>
                          <a href="{!!URL::to('/precio')!!}"><i class='fa fa-money'></i> Lista de precios al público</a>
                        </li>
                        <li>
                          <a href="{!!URL::to('/compras/create')!!}"><i class="fa fa-credit-card"></i> Solicitar refacción</a>
                        </li>
                      </ul>
                    </li>
                  <?php endif ?>

                  <?php if(Auth::user()->perfil_id == '4'): ?>
                    <div class="navbar-default sidebar" role="navigation">
                      <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">

                          <li>
                            <a href="#"><i class="fa fa-bicycle"></i> Mensajeria<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                              <li>
                                <a href="<?php
                                $dato="/compram/?idss=";
                                $id=Auth::user()->id; //IMPORTANTE ESTO LO RECUPERAREMOS CON: Auth::user()->id == '1' Para mensajero
                                $link_address= $dato.$id;
                                echo $link_address;?>"><i class='fa fa-credit-card'></i> Compra de refacción</a>
                              </li>
                              <li>
                                <a href="/envre/show"><i class='fa fa-bicycle'></i> Recoleccion de equipo</a>
                              </li>
                            </ul>
                          </li>
                        <?php endif ?>

                        <?php if(Auth::user()->perfil_id == '5'): ?>
                          <div class="navbar-default sidebar" role="navigation">
                            <div class="sidebar-nav navbar-collapse">
                              <ul class="nav" id="side-menu">

                                <li>
                                  <a href="#"><i class="fa fa-credit-card"></i> Compras<span class="fa arrow"></span></a>
                                  <ul class="nav nav-second-level">
                                    <li>
                                      <a href="/compras"><i class='fa fa-archive'></i> Ordenes de compra de refacción</a>
                                    </li>
                                    <li>
                                      <a href="/proveedor/create"><i class='fa fa-group'></i> Alta de proveedores</a>
                                    </li>
                                    <li>
                                      <a href="/proveedor"><i class='fa fa-bars'></i> Lista de proveedores</a>
                                    </li>
                                  </ul>
                                </li>

                                <li>
                                  <a href="#"><i class="fa fa-sign-out"></i> Gastos<span class="fa arrow"></span></a>
                                  <ul class="nav nav-second-level">
                                    <li>
                                      <a href="/gasto/create"><i class='fa fa-plus fa-fw'></i>Ingresar Gasto</a>
                                    </li>
                                  </ul>
                                </li>  

                                <li>
                                  <a href="#"><i class="fa fa-archive"></i> Inventario<span class="fa arrow"></span></a>
                                  <ul class="nav nav-second-level">
                                    <li>
                                      <a href="/producto/"><i class='fa fa-cubes'></i> Inventario</a>
                                    </li>
                                    <li>
                                      <a href="/producto/create"><i class='fa fa-arrow-down'></i> Registro producto en Inventario</a>
                                    </li>
                                    <li>
                                      <a href="/salida/create"><i class='fa fa-arrow-up'></i> Transferir a sucursal</a>
                                    </li>
                                    <li>
                                      <a href="/salida"><i class='fa fa-file-text'></i> Reporte de salidas</a>
                                    </li>
                                    <li>
                                      <a href="#"><i class='fa fa-sitemap'></i> Categorias de productos</a>
                                      <ul class="nav nav-third-level">
                                        <li>
                                          <a href="/categoria/create"><i class='fa fa-star-o'></i> Nueva categoria de inventario</a>
                                        </li>
                                        <li>
                                          <a href="/categoria"><i class='fa fa-sort-amount-desc'></i> Categoria de inventario</a>
                                        </li>
                                      </ul>
                                    </li>
                                  </ul>
                                </li>



                              <?php endif ?>

                              <?php if(Auth::user()->perfil_id == '6'): ?>
                                <div class="navbar-default sidebar" role="navigation">
                                  <div class="sidebar-nav navbar-collapse">
                                    <ul class="nav" id="side-menu">

                                     <li>
                                      <a href="#"><i class="fa fa-pie-chart"></i> Reportes & Estadisticas<span class="fa arrow"></span></a>
                                      <ul class="nav nav-second-level">
                                        <li>
                                          <a href="/pdf"><i class='fa fa-bar-chart'></i>Reporte de ventas</a>
                                        </li>
                                        <li>
                                          <a href="/saber"><i class='fa fa-bar-chart'></i> Reporte: ¿Como se entero de nosotros?</a>
                                        </li>
                                        <li>
                                          <a href="/horas"><i class='fa fa-bar-chart'></i> Reporte: Mayor afluencia de clientes en el dia</a>
                                        </li>
                                        <li>
                                          <a href="/asistencia"><i class='fa fa-stack-overflow'></i> Reporte: historico de servicios por  nombre cliente </a>
                                        </li>
                                      </ul>
                                    </li>

 
                                    <li>
                                      <a href="#"> <i class='fa fa-file-text-o'></i> Notas de venta</a>
                                      <ul class="nav nav-fourth-level">
                                        <a href="{!!URL::to('/blanco/create')!!}"><i class='fa fa-file-text'></i> Nota de venta vacia</a>
                                      </ul>
                                      <ul class="nav nav-fourth-level">
                                        <a href="{!!URL::to('/reimpn')!!}"><i class='fa fa-print'></i> Reimprimir nota de venta </a>
                                      </ul>
                                    </li>

                                    <li>
                                      <a href="#"><i class="fa fa-sign-out"></i> Gastos<span class="fa arrow"></span></a>
                                      <ul class="nav nav-second-level">
                                        <li>
                                          <a href="/gasto/create"><i class='fa fa-plus fa-fw'></i>Ingresar Gasto</a>
                                        </li>
                                      </ul>
                                    </li> 


                                  <?php endif ?>


                                  <?php if(Auth::user()->perfil_id == '7'): ?>
                                    <div class="navbar-default sidebar" role="navigation">
                                      <div class="sidebar-nav navbar-collapse">
                                        <ul class="nav" id="side-menu">
                                          <li>
                                            <a href="{!!URL::to('/precio')!!}"><i class='fa fa-money'></i> Lista de precios al público</a>
                                          </li>
                                        <?php endif ?>

                                        <?php if(Auth::user()->perfil_id == '9'): ?>
                                          <div class="navbar-default sidebar" role="navigation">
                                            <div class="sidebar-nav navbar-collapse">
                                              <ul class="nav" id="side-menu">
                                                <li>
                                                  <a href="{!!URL::to('/cliente')!!}"> <i class='fa fa-file-text'></i>  Consulta tu orden de servicio</a>
                                                </li>
                                              <?php endif ?>





                                            </ul>
                                          </div>
                                        </div>

                                      </nav>




                                      <div id="page-wrapper">




                                        <div class="container">

                                         <div class="container">
   
  <!--<div id="id" class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
      <label id = "label" for="male"></label>
    </div>
  </div>-->
</div>
                                        </div>



                                        @yield('content')

                                      </div>

                                    </div>

                                    {!!Html::script('js/jquery.min.js')!!}
                                    {!!Html::script('js/bootstrap.min.js')!!}
                                    {!!Html::script('js/metisMenu.min.js')!!}
                                    {!!Html::script('js/sb-admin-2.js')!!}




                                  </body>

                                  </html>
