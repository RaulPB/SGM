    @extends('layouts.admin')
    @section('content')
<head>
  <title>Encuesta al cliente</title>
</head>

<script type="text/javascript" src="https://www.google.com/jsapi"></script> 
<body>


<div  align="center"> <img src={{$imagen->politicas}} style="width:500%; max-width:250px;" > </div>
FECHA DE CONSULTA: {{$hoy}} 

<div style="background-color: #3867b7; height: 16px"></div>
<div id="GraficoGoogleChart-ejemplo-1" style="width: 900px; height: 700px"></div>

</body>

<script>
  google.load("visualization", "1", {packages:["corechart"]});
   google.setOnLoadCallback(dibujarGrafico);
   function dibujarGrafico() {
     // Tabla de datos: valores y etiquetas de la gráfica
     var data = google.visualization.arrayToDataTable([
       ['Sucursal 1', 'Clientes registrados'],
       ['8am - 10 am', {{$F1}}],
       ['10 am - 12 pm', {{$F2}}],
       ['12 pm - 2 pm', {{$F3}}],
       ['2 pm - 4 pm', {{$F4}}],
       ['4 pm - 6 pm', {{$F5}}],
       ['6 pm - 8 pm', {{$F6}}],


     ]);
     var options = {
       title: 'Afluencia de clientes por rango de horas en sucursal seleccionada',
       is3D: true,
     }
     // Dibujar el gráfico
     new google.visualization.ColumnChart( 
     //ColumnChart sería el tipo de gráfico a dibujar
       document.getElementById('GraficoGoogleChart-ejemplo-1')
     ).draw(data, options);
   }
 </script>
@stop()

