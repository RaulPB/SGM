<html>
<head>
  <title>Modulo estadistico Ifiix</title>
</head>

<script type="text/javascript" src="https://www.google.com/jsapi"></script> 

<body>



      <body>
        <br><br>
            <div class="col-lg-6" ALIGN=center>
                <table class="col-lg-12">
              <thead>
                <tr>
                <th><img src={{$imagen->politicas}} style="width:500%; max-width:150px;" ></th>
                  
                </tr>

              </thead>
              <tbody>
                <tr>

                </tr>
              </tbody>
            </table>

            
            <div class="col-lg-10 col-md-10 col-sm-12"><br><br></div>
            <h4 class="">Reporte de ventas  y gastos con fechas igual a: {{$fechauno}} y menor a: {{$fechados}} </h4>
            <h4 class=""></h4>
            <div style="background-color: #3867b7; height: 16px"></div>

                      
                      <table  WIDTH="100%" style="text-align:center;"   border-collapse: separate;>
                        <thead >
                          <tr>
                              <th colspan="2" ALIGN="center">No. Servicio</th>
                              <th colspan="2" ALIGN="center">Sucursal</th>
                              <th colspan="2" ALIGN="center">Cliente</th>
                              <th colspan="2" ALIGN="center">Tipo de pago</th>
                               <th colspan="80" ALIGN="center">Fecha de pago</th>
                               <th colspan="30" ALIGN="center">Monto</th>
                          </tr>
                        </thead>
                        <tbody>
                      @foreach($E1 as $grs)
                        @if($grs->abono1 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono1 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Efectivo</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago1))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono1}}</td>
                          </tr>
                         @endif 
                      @endforeach

                       @foreach($E2 as $grs)
                        @if($grs->abono2 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono2 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Efectivo</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago2))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono2}}</td>
                          </tr>
                         @endif 
                      @endforeach

                       @foreach($E3 as $grs)
                        @if($grs->abono3 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono3 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Efectivo</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago3))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono3}}</td>
                          </tr>
                         @endif 
                      @endforeach

                       @foreach($E4 as $grs)
                        @if($grs->abono4 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono4 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Efectivo</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago4))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono4}}</td>
                          </tr>
                         @endif 
                      @endforeach

                       @foreach($E5 as $grs)
                        @if($grs->abono5 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono5 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Efectivo</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago5))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono5}}</td>
                          </tr>
                         @endif 
                      @endforeach

                      <!-- ++++++++++++++++++++++++++++++++++TARJETAS++++++++++++++++++++++++++++++++++++++++++++++ -->
                      @foreach($T1 as $grs)
                        @if($grs->abono1 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono1 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Tarjeta</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago1))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono1}}</td>
                          </tr>
                         @endif 
                      @endforeach

                     @foreach($T2 as $grs)
                     @if($grs->abono2 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono2 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Tarjeta</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago2))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono2}}</td>
                          </tr>
                         @endif 
                      @endforeach

                      @foreach($T3 as $grs)
                      @if($grs->abono3 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono3 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Tarjeta</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago3))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono3}}</td>
                          </tr>
                         @endif 
                      @endforeach

                      @foreach($T4 as $grs)
                      @if($grs->abono4 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono4 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Tarjeta</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago4))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono4}}</td>
                          </tr>
                         @endif 
                      @endforeach

                      @foreach($T5 as $grs)
                      @if($grs->abono5 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono5 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Tarjeta</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago5))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono5}}</td>
                          </tr>
                         @endif 
                      @endforeach

                      <!-- +++++++++++++++++++++++++++++++TRANSFERENCIA++++++++++++++++++++++++++++++++++++++++++++ -->
                       @foreach($TS1 as $grs)
                        @if($grs->abono1 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono1 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Transferencia</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago1))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono1}}</td>
                          </tr>
                         @endif 
                      @endforeach

                     @foreach($TS2 as $grs)
                     @if($grs->abono2 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono2 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Transferencia</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago2))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono2}}</td>
                          </tr>
                         @endif 
                      @endforeach

                      @foreach($TS3 as $grs)
                      @if($grs->abono3 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono3 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Transferencia</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago3))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono3}}</td>
                          </tr>
                         @endif 
                      @endforeach

                      @foreach($TS4 as $grs)
                      @if($grs->abono4 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono4 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Transferencia</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago4))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono4}}</td>
                          </tr>
                         @endif 
                      @endforeach

                      @foreach($TS5 as $grs)
                      @if($grs->abono5 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono5 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Transferencia</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago5))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono5}}</td>
                          </tr>
                         @endif 
                      @endforeach

                      <!-- +++++++++++++++++++++++++++++++DEPOSITO++++++++++++++++++++++++++++++++++++++++++++ -->
                        @foreach($D1 as $grs)
                        @if($grs->abono1 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono1 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Deposito</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago1))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono1}}</td>
                          </tr>
                         @endif 
                      @endforeach

                     @foreach($D2 as $grs)
                     @if($grs->abono2 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono2 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Deposito</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago2))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono2}}</td>
                          </tr>
                         @endif 
                      @endforeach

                      @foreach($D3 as $grs)
                      @if($grs->abono3 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono3 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Deposito</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago3))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono3}}</td>
                          </tr>
                         @endif 
                      @endforeach

                      @foreach($D4 as $grs)
                      @if($grs->abono4 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono4 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Deposito</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago4))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono4}}</td>
                          </tr>
                         @endif 
                      @endforeach

                      @foreach($D5 as $grs)
                      @if($grs->abono5 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono5 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">Deposito</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago5))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono5}}</td>
                          </tr>
                         @endif 
                      @endforeach

                       <!-- +++++++++++++++++++++++++++++++PAY++++++++++++++++++++++++++++++++++++++++++++ -->
                        @foreach($P1 as $grs)
                        @if($grs->abono1 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono1 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">PAY PAL</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago1))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono1}}</td>
                          </tr>
                         @endif 
                      @endforeach

                     @foreach($P2 as $grs)
                     @if($grs->abono2 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono2 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">PAY PAL</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago2))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono2}}</td>
                          </tr>
                         @endif 
                      @endforeach

                      @foreach($P3 as $grs)
                      @if($grs->abono3 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono3 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">PAY PAL</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago3))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono3}}</td>
                          </tr>
                         @endif 
                      @endforeach

                      @foreach($P4 as $grs)
                      @if($grs->abono4 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono4 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">PAY PAL</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago4))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono4}}</td>
                          </tr>
                         @endif 
                      @endforeach

                      @foreach($P5 as $grs)
                      @if($grs->abono5 == 0)
                          <tr>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="2" style="text-align: center;"></td>
                           <td colspan="80" style="text-align: center;"></td>
                           <td colspan="30" style="text-align: center;"></td>
                          </tr>
                         @endif 
                         @if($grs->abono5 != 0)
                          <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <? 
                           $sucuid = $grs->sucursal;
                           $nsucu = DB::table('sucursals')->where('id', $sucuid)->pluck('nameS');
                           ?>
                           
                           <td colspan="2" style="text-align: center;"><? echo $nsucu ?></td>
                           <td colspan="2" style="text-align: center;">{{$grs->nombrecliente}}</td>
                           <td colspan="2" style="text-align: center;">PAY PAL</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->fechapago5))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->abono5}}</td>
                          </tr>
                         @endif 
                      @endforeach


                      

                      <tr><H3> </H3></tr>
                        </tbody>
                    </table>

                     
           <h2>TOTAL DE VENTA SEGUN PARAMETROS DE FECHA ESTABLECIDOS: </h2><h1> $ {{number_format($TOT,2)}} MXN</h1>
           
           
                </div>

<div id="GraficoGoogleChart-ejemplo-1" style="width: 1200px; height: 900px"></div>

<h1 align="center"> Gastos</h1> 
<table  WIDTH="100%" style="text-align:center;"   border-collapse: separate;>
                        <thead >
                          <tr>
                              <th colspan="2" ALIGN="center">Id</th>
                              <th colspan="2" ALIGN="center">Genero Gasto</th>
                              <th colspan="2" ALIGN="center">Razón del gasto</th>
                              <th colspan="80" ALIGN="center">Fecha del gasto</th>
                               <th colspan="30" ALIGN="center">Monto</th>
                          </tr>
                        </thead>
                        <tbody>
                      @foreach($gastog as $grs)
                           <tr>
                           <td colspan="2" style="text-align: center;">{{$grs->id}}</td>
                           <td colspan="2" style="text-align: center;">{{$grs->genero}}</td>
                           <td colspan="2" style="text-align: center;">{{$grs->razon}}</td>
                           <td colspan="80" style="text-align: center;">{{date('d-m-Y', strtotime($grs->created_at))}}</td>
                           <td colspan="30" style="text-align: center;">{{$grs->gasto}}</td>
                          </tr>
                       
                      @endforeach
                           <tr><H3> </H3></tr>
                        </tbody>
                    </table>


                     <h2 align="center">TOTAL DE GASTOS SEGUN PARAMETROS DE FECHA ESTABLECIDOS: </h2><h1 align="center"> $ {{number_format($gastot,2)}} MXN</h1>

                     <h2 align="center">TOTAL DE GANANCIA VENTAS-GASTOS: </h2><h1 align="center"> $ {{number_format($UTI,2)}} MXN</h1> 



</body>
</html>

<script>

  google.load("visualization", "1", {packages:["corechart"]});
   google.setOnLoadCallback(dibujarGrafico);
   function dibujarGrafico() {
     // Tabla de datos: valores y etiquetas de la gráfica
     var data = google.visualization.arrayToDataTable([
       ['Sucursal 1', 'Capital recabado en este tipo de pago'],
       ['Efectivo', {{$AT}}],
       ['Tarjeta', {{$BT}}],
       ['Transferencias', {{$CT}}],
       ['Deposito', {{$DT}}],
       ['Pay Pal', {{$ET}}],

     ]);
     var options = {
       title: 'Pagos realizados en sucursal seleccionada',
       is3D: true,
     }
     // Dibujar el gráfico
     new google.visualization.PieChart( 
     //ColumnChart sería el tipo de gráfico a dibujar
       document.getElementById('GraficoGoogleChart-ejemplo-1')
     ).draw(data, options);
   }
 </script> 


