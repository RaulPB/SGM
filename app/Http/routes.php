<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {//metodo usado solo para apuntar a vista home de laravel; deshabilitada al fijar una nueva raiz
    return view('welcome');
});*/
//Por favor cambia
 //ROUTES DEFINIDOS EN ORDEN DE CREACION
Route::get('/','FrontController@index');  //AQUI INICIA EL PROYECTO IFIIX
Route::resource('log','LogController'); //para iniciar sesion (validaciones)
Route::get('admin','FrontController@admin');//AQUI MANDAMOS AL PANEL DE CONTROL DE ADMINISTRADOR VISTA DESPUES DE PASAR LA VALIDACION CORRESPONDIENTE.
Route::get('correo','FrontController@correo');//vista correo son enrutamiento REST

Route::resource('mail','MailController');//para enrutamiento REST del correo
Route::resource('usuario','UsuarioController');//para dar de alta usuarios
Route::resource('sucursal','SucursalController'); //para dar de alta sucursales nuevos y visualizarlos
Route::resource('status','StatusController'); //para dar de alta sucursales nuevos y visualizarlos
Route::resource('constru','ReparaController'); //para visualizar orden de servicio.
Route::resource('servicio','ServsController'); //para visualizar y editar ordenes desde el usuario Receptor
Route::resource('tecnico','TecnicoController'); //para visualizar y editar ordenes desde el usuario Receptor
Route::resource('compras','ComprasController'); //para visualizar y editar solicitudes de compra.
Route::resource('mensajes','MensajeController'); //para visualizar y editar mensajes.
Route::resource('garantia','GarantiaController'); //para visualizar y editar mensajes para garantias.
Route::resource('proveedor','ProveedorController');//para crear, visualizar y editar proveedores
Route::resource('categoria','CategoriaController');//para agregar, visualizar y editar categorias
Route::resource('producto','ProductoController');//para agregar productos nuevos
Route::resource('producto2','Producto2Controller');//para agregar productos nuevos
Route::resource('salida','SalidasController');//para agregar productos nuevos
Route::resource('salida2','Salidas22Controller');//para agregar productos nuevos
Route::resource('compram','MensajeroController');//para agregar compras al mensajero
Route::resource('envre','EnvioController');//para agregar recolecciones del recepcionista
Route::resource('envre2','Envio2Controller');//para agregar envio del recepcionista
Route::get('logout','LogController@logout');//Para salir de la sesion iniciada
Route::resource('acerca','AcercaController');//Para ver acerca de
Route::get('saber', 'PdfController@encuesta');//Para descargar documentos pdf reporte ENCUESTA!!!!!!!!!!!!
Route::get('horas', 'PdfController@horas');//Para visualizar el reporte de afluencia de clientes por sucursal, fechas y horas
Route::get('pdf', 'PdfController@create');//Para descargar reporte de ventas diarias
Route::get('semana', 'PdfController@semana');//Para descargar reporte de ventas semanales
Route::get('mes', 'PdfController@mes');//Para descargar reporte de ventas semanales
Route::resource('carga', 'PdfController');//Para visualizar carga de tecnicos
Route::resource('precio', 'PreciosController');//Para visualizar precios a publico
Route::resource('encuesta', 'EncuestaController');//Para lanzar la encuesta de como se entero de nosotros
Route::get('pdfd', 'PdfController@diaria');
Route::resource('archivo', 'DiarioController');//Para subir archivos
Route::resource('reimpn', 'ImNoController');//reimprimir notas de venta
Route::resource('blanco', 'BlancoController');//imprimir nota de venta vacia
Route::resource('cliente', 'ClienteController');//dar acceso al cliente a sus ordenes de servicio
Route::resource('clientes', 'ClientesController');//dar acceso al cliente a sus ordenes de servicio
Route::resource('reporte', 'PDFController');//dar acceso al cliente a sus ordenes de servicio
Route::resource('asistencia', 'AsistenciaController');//validamos el historico de ordenes por cliente especifico
Route::resource('politica', 'PoliticaController');//validamos el historico de ordenes por cliente especifico
Route::resource('gasto', 'GastoController');//validamos el historico de ordenes por cliente especifico

Route::get('encuestas', function () {
    return redirect('encuesta/create');
});
