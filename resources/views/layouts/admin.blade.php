<!DOCTYPE html>
<html lang="en">

<head>
  <title>Ifiix: Reparamos tu móvil</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>



  {!!Html::style('css/bootstrap.min.css')!!}
  {!!Html::style('css/metisMenu.min.css')!!}
  {!!Html::style('css/sb-admin-2.css')!!}
  {!!Html::style('css/font-awesome.min.css')!!}

</head>

<body>
  <!--<script language="JavaScript" type="text/javascript">
  alert("NO OLVIDES OFRECER TAL PRODUCTO !!");
</script>-->


<div id="wrapper">


  @if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <ul>
        <li>{!! \Session::get('success') !!}</li>
      </ul>
    </div>
  @endif

  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="/admin">Ifiix Administración</a>
    </div>


    <ul class="nav navbar-top-links navbar-right">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          {!!Auth::user()->name!!}<i class="fa fa-user"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
          <li class="divider"></li>
          <li><a href="/acerca"><i class="fa fa-apple"></i> Acerca de:</a>
          </li>
          <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
          </li>
        </ul>
      </li>
    </ul>
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
              <a href="#"><i class="fa fa-pie-chart"></i> Estadisticas<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="/pdf"><i class='fa fa-bar-chart'></i>Reporte: Venta Diaria</a>
                </li>
                <li>
                  <a href="/semana"><i class='fa fa-bar-chart'></i> Reporte: Venta Semanal</a>
                </li>
                <li>
                  <a href="/mes"><i class='fa fa-bar-chart'></i> Reporte: Venta Mensual</a>
                </li>
                <li>
                  <a href="/saber"><i class='fa fa-bar-chart'></i> Reporte: ¿Como se entero de nosotros?</a>
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
                <a href="/producto/"><i class='fa fa-cubes'></i> Inventario</a>
              </li>
              <li>
                <a href="/producto/create"><i class='fa fa-arrow-down'></i> Registro nueva entrada Inventario</a>
              </li>
              <li>
                <a href="/salida/create"><i class='fa fa-arrow-up'></i> Registro salida a Inventario</a>
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
                            <a href="#"><i class="fa fa-archive"></i> Inventario<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                              <li>
                                <a href="/producto/"><i class='fa fa-cubes'></i> Inventario</a>
                              </li>
                              <li>
                                <a href="/producto/create"><i class='fa fa-arrow-down'></i> Registro nueva entrada Inventario</a>
                              </li>
                              <li>
                                <a href="/salida/create"><i class='fa fa-arrow-up'></i> Registro salida a Inventario</a>
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
                                  <a href="#"><i class="fa fa-bar-chart fa-fw"></i>Estadisticas<span class="fa arrow"></span></a>
                                  <ul class="nav nav-second-level">
                                    <li>
                                      <a href="/constru"><i class='fa fa-list-ol fa-fw'></i> Por empleado</a>
                                    </li>
                                    <li>
                                      <a href="/constru"><i class='fa fa-list-ol fa-fw'></i> Por sucursal</a>
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
                                      <a href="/producto/create"><i class='fa fa-arrow-down'></i> Registro nueva entrada Inventario</a>
                                    </li>
                                    <li>
                                      <a href="/salida/create"><i class='fa fa-arrow-up'></i> Registro salida a Inventario</a>
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


                              <?php if(Auth::user()->perfil_id == '7'): ?>
                                <div class="navbar-default sidebar" role="navigation">
                                  <div class="sidebar-nav navbar-collapse">
                                    <ul class="nav" id="side-menu">
                                      <li>
                                        <a href="{!!URL::to('/precio')!!}"><i class='fa fa-money'></i> Lista de precios al público</a>
                                      </li>



                                    <?php endif ?>





                                  </ul>
                                </div>
                              </div>

                            </nav>

                            <div id="page-wrapper">
                              @yield('content')

                            </div>

                          </div>

                          {!!Html::script('js/jquery.min.js')!!}
                          {!!Html::script('js/bootstrap.min.js')!!}
                          {!!Html::script('js/metisMenu.min.js')!!}
                          {!!Html::script('js/sb-admin-2.js')!!}


                        </body>

                        </html>
