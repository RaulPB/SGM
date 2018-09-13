<html lang="en">

<body>
  <br><br>
  <div class="col-lg-12">

    <table class="" align="justify">
      <thead>
        <tr>
          <th><img src= {{$imagen->politicas}} style="width:600%; max-width:150px;"></th>
         
          <th style="text-align: center;">
            <FONT SIZE=2>
             {{$cabe->politicas}}
            </FONT>
          </th>

          <th></th>
        </tr>
      </thead>
    </table>
    <div class="col-lg-10 col-md-10 col-sm-10"></div>
    <h4 class="">Nota de venta: {{$claven}}{{$cont}}  ____________________________________________________________________ Fecha de venta: {{\Carbon\Carbon::now()}}</h4>
    <div style="background-color: #3867b7; height: 16px"></div>
    <br>
    <div class="presupuestos">
      <table  BORDER=0 WIDTH=775 class="display" style="text-align:center;"   border-collapse: separate;>
        <thead >
          <tr>
            <th colspan="2" ALIGN="center">Orden de servicio</th>
            <th ALIGN="center">Nombre cliente</th>
            <th ALIGN="center">Modelo del equipo</th>
            <th colspan="2" ALIGN="center">Telefono/celular</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="2" align="center"> {{$id}}</th>
            <td align="center"> {{$nombrecliente}}</th>
              <td align="center">{{$marca}} {{$modelo}}</td>
              <td colspan="2" align="center">{{$telefono}}</td>
            </tr>
          </tbody>
        </table>

        <TABLE BORDER=1 WIDTH=775>
          <thead >
            <tr>
              <th ALIGN="center">Detalles</th>
              <th ALIGN="center">Anticipos</th>
            </tr>
            <tr>
              <th rowspan="5" ALIGN="justify">{{$diagnostico2}}</th>
              @if ($pago1 <> 0)
                <th ALIGN="center">$ {{number_format($pago1,2)}}</th>
              @endif
              @if ($pago1 == 0)
                <th ALIGN="center">--</th>
              @endif
            </tr>
            <tr>
              @if ($pago2 <> 0)
                <th ALIGN="center">$ {{number_format($pago2,2)}}</th>
              @endif
              @if ($pago2 == 0)
                <th ALIGN="center">--</th>
              @endif
            </tr>
            <tr>
              @if ($pago3 <> 0)
                <th ALIGN="center">$ {{number_format($pago3,2)}}</th>
              @endif
              @if ($pago3 == 0)
                <th ALIGN="center">--</th>
              @endif
            </tr>
            <tr>
              @if ($pago4 <> 0)
                <th ALIGN="center">$ {{number_format($pago4,2)}}</th>
              @endif
              @if ($pago4 == 0)
                <th ALIGN="center">--</th>
              @endif
            </tr>
            <tr>
              @if ($pago5 <> 0)
                <th ALIGN="center">$ {{number_format($pago5,2)}}</th>
              @endif
              @if ($pago5 == 0)
                <th ALIGN="center">--</th>
              @endif
            </tr>
            <tr>

              @if ($costo <> 0)
                <td ALIGN="center"> Cantidad con letra: {{$letras}}</td>
                <FONT SIZE=1><td ALIGN="center">Total:$ {{$costo}} M.N.</td></FONT>
              @endif
              @if ($costo == 0)
                <td ALIGN="center"> Cantidad con letra: </td>
                <FONT SIZE=1><td ALIGN="center">Total: --</td></FONT>
              @endif

            </tr>

            <tr>
              <td ALIGN="center" colspan="1">Dia y hora de entrega: {{\Carbon\Carbon::now()}}</td>
              <td ALIGN="center" colspan="1">Cantidad Restante:$ {{$resta}} M.N.</td>
            </tr>
            <tr>
              <td ALIGN="center" colspan="2">Tiempo de garantia: {{$garantia}}</td>
            </tr>

            <tr>
              <th colspan="2" rowspan="5" ALIGN="justify"><FONT SIZE=1>{{$avi->politicas}}</FONT></th>
              </tr>

              <tr>
                <FONT SIZE=1>{{$poli->politicas}}</FONT>
              </tr>
            </thead>
          </TABLE>

          <br> </br>
  <div style="background-color: #3867b7; height: 16px"></div>
          <h4 class="">Nota de venta: {{$claven}}{{$cont}}  ____________________________________________________________________ Fecha de venta: {{\Carbon\Carbon::now()}}</h4>
          <br>
          <div class="presupuestos">
            <table  BORDER=0 WIDTH=775 class="display" style="text-align:center;"   border-collapse: separate;>
              <thead >
                <tr>
                  <th ALIGN="center">Nombre cliente</th>
                  <th ALIGN="center">Modelo del equipo</th>
                  <th colspan="2" ALIGN="center">Telefono/celular</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td align="center"> {{$nombrecliente}}</th>
                    <td align="center">{{$marca}} {{$modelo}}</td>
                    <td colspan="2" align="center">{{$telefono}}</td>
                  </tr>
                </tbody>
              </table>




            <TABLE BORDER=1 WIDTH=775>
              <thead >
                <tr>
                  <th ALIGN="center">Detalles</th>
                  <th ALIGN="center">Anticipos</th>
                </tr>
                <tr>
                  <th rowspan="5" ALIGN="justify">{{$diagnostico2}}</th>
                  @if ($pago1 <> 0)
                    <th ALIGN="center">$ {{number_format($pago1,2)}}</th>
                  @endif
                  @if ($pago1 == 0)
                    <th ALIGN="center">--</th>
                  @endif
                </tr>
                <tr>
                  @if ($pago2 <> 0)
                    <th ALIGN="center">$ {{number_format($pago2,2)}}</th>
                  @endif
                  @if ($pago2 == 0)
                    <th ALIGN="center">--</th>
                  @endif
                </tr>
                <tr>
                  @if ($pago3 <> 0)
                    <th ALIGN="center">$ {{number_format($pago3,2)}}</th>
                  @endif
                  @if ($pago3 == 0)
                    <th ALIGN="center">--</th>
                  @endif
                </tr>
                <tr>
                  @if ($pago4 <> 0)
                    <th ALIGN="center">$ {{number_format($pago4,2)}}</th>
                  @endif
                  @if ($pago4 == 0)
                    <th ALIGN="center">--</th>
                  @endif
                </tr>
                <tr>
                  @if ($pago5 <> 0)
                    <th ALIGN="center">$ {{number_format($pago5,2)}}</th>
                  @endif
                  @if ($pago5 == 0)
                    <th ALIGN="center">--</th>
                  @endif
                </tr>
                <tr>

                  @if ($costo <> 0)
                    <td ALIGN="center"> Cantidad con letra: {{$letras}}</td>
                    <FONT SIZE=1><td ALIGN="center">Total:$ {{$costo}} M.N.</td></FONT>
                  @endif
                  @if ($costo == 0)
                    <td ALIGN="center"> Cantidad con letra: </td>
                    <FONT SIZE=1><td ALIGN="center">Total: --</td></FONT>
                  @endif

                </tr>

                <tr>
                  <td ALIGN="center" colspan="1">Dia y hora de entrega: {{\Carbon\Carbon::now()}}</td>
                  <td ALIGN="center" colspan="1">Cantidad Restante:$ {{$resta}} M.N.</td>
                </tr>
                <tr>
                  <td ALIGN="center" colspan="2">Tiempo de garantia: {{$garantia}}</td>
                </tr>

                <tr>
                  <th colspan="2" rowspan="5" ALIGN="justify"><FONT SIZE=1>{{$avi->politicas}}</FONT></th>
                  </tr>

                  <tr>
                    <FONT SIZE=1>{{$poli->politicas}}</FONT>
                  </tr>
                </thead>
              </TABLE>

        </div>








      </div>
    </body>
    </html>
