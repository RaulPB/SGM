<html lang="en">

<body>
  <br><br>
  <div class="col-lg-12">

    <table class="" align="center">
      <thead>
        <tr>
          <th><img src="https://scontent.fjal1-1.fna.fbcdn.net/v/t1.0-9/11403237_877024122332859_5771792069315024696_n.jpg?oh=968b51f2dd93c12b4f41350afb9d240a&oe=5A172DDB" style="width:800%; max-width:200px;"></th>
          <th></th>
          <th style="text-align: center">
            <FONT SIZE=0>
              <pre>Dahab García Ávila</pre>
              <pre>R.F.C GAAD8703172M6</pre>
              <pre>CURP. GAAD870317HVZRVH03</pre>
              <pre>Pedro de Alvarado #533-bis Fracc. Reforma C.P. 91919 Veracruz, Ver-</pre>
              <pre>Cuauhtémoc #4254 casi esq. Alcocer. Col. Centro C.P 91700 Veracruz, Ver.</pre>
              <pre>facturasifiix@gmail.com</pre>
              <pre>Tel: 2299379301 & 3345634</pre>
              <pre>Whatsapp: 2291169546 & 2293567746</pre>
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
              <td ALIGN="center" colspan="2">Dia y hora de entrega: {{\Carbon\Carbon::now()}}</td>
            </tr>
            <tr>
              <td ALIGN="center" colspan="2">Tiempo de garantia: {{$garantia}}</td>
            </tr>

            <tr>
              <th colspan="2" rowspan="5" ALIGN="justify">Aviso importante: El plazo para recoger su equipo es de 5 dias habiles a partir de la fecha de la entrega programada , transcurrido este tiempo. Ifiix podra disponer de su equipo. Si el equipo no es recogido inmediatamente se enviara a planta donde se destinara
                al "Programa de reciclaje" sin previo aviso y sin que esto represente una obligación de nuestra parte con el cliente. *El cliente acepta una vez que Ifiix abra el equipo pierde la garantia de fabrica con la marca.</th>
              </tr>

              <tr>
                Politicas de garantia:
                *La garantia solo es valida por defectos de fabrica.
                *La garantia NO es valida cuando haya:
                -Sufrido un golpe o enmendadura.
                -Estado en contacto con cualquier tipo de liquido.
                -Tenido corto circuito debido a cambio de voltaje.
                -Sido abierto por una persona ajena a Ifiix.
                *En equipos reparados por estar mojados NO HAY GARANTIA.
                *SIN EXCEPCION es necesario presentar su nota de venta para aplicación de garantía.
                *Tiempo de respuesta de su garantia es de 2 a 7 días hábiles.
                *En ningún caso Ifiix se hace responsable de los gastos extraordinarios
                que le ocacionen aplicar su garantia.
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
                  <td ALIGN="center" colspan="2">Dia y hora de entrega: {{\Carbon\Carbon::now()}}</td>
                </tr>
                <tr>
                  <td ALIGN="center" colspan="2">Tiempo de garantia: {{$garantia}}</td>
                </tr>

                <tr>
                  <th colspan="2" rowspan="5" ALIGN="justify">Aviso importante: El plazo para recoger su equipo es de 5 dias habiles a partir de la fecha de la entrega programada , transcurrido este tiempo. Ifiix podra disponer de su equipo. Si el equipo no es recogido inmediatamente se enviara a planta donde se destinara
                    al "Programa de reciclaje" sin previo aviso y sin que esto represente una obligación de nuestra parte con el cliente. *El cliente acepta una vez que Ifiix abra el equipo pierde la garantia de fabrica con la marca.</th>
                  </tr>

                  <tr>
                    Politicas de garantia:
                    *La garantia solo es valida por defectos de fabrica.
                    *La garantia NO es valida cuando haya:
                    -Sufrido un golpe o enmendadura.
                    -Estado en contacto con cualquier tipo de liquido.
                    -Tenido corto circuito debido a cambio de voltaje.
                    -Sido abierto por una persona ajena a Ifiix.
                    *En equipos reparados por estar mojados NO HAY GARANTIA.
                    *SIN EXCEPCION es necesario presentar su nota de venta para aplicación de garantía.
                    *Tiempo de respuesta de su garantia es de 2 a 7 días hábiles.
                    *En ningún caso Ifiix se hace responsable de los gastos extraordinarios
                    que le ocacionen aplicar su garantia.
                  </tr>
                </thead>
              </TABLE>

        </div>








      </div>
    </body>
    </html>
