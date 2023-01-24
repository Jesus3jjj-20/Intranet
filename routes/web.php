<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DistribuidoresController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\PlanesController;
use App\Http\Controllers\RenovacionesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(InicioController::class)->group(function () {
    Route::get('/', 'index')->middleware(['auth'])->name("inicio");
});



Route::controller(UserController::class)->group(function () {
    Route::get('/perfil', 'index')->middleware(['auth'])->name("perfil");
    Route::get('/logout', 'cerrarSesion')->middleware(['auth'])->name("cerrarSesion");
    Route::post('/actualizar', 'actualizarInformacion')->name("actualizarInformacion");
    Route::post('/imagenPerfil', 'cambiarImagenPerfil')->name("cambiarImagenPerfil");
    Route::post('/resetear', 'resetearContrasenna')->name("resetearContrasenna");
    Route::get('/administracion', 'administracion')->middleware(['auth'])->name("administracion");
    Route::get('/administracionUsuarios', 'administracionUsuarios')->middleware(['auth'])->name("administracionUsuarios");
    Route::get('/creacionUsuarios', 'creacionUsuarios')->middleware(['auth'])->name("creacionUsuarios");
    Route::post('/creacionUsuariosDatos', 'creacionUsuariosDatos')->name("creacionUsuariosDatos");
    Route::get('/editarUsuarios', 'editarUsuarios')->middleware(['auth'])->name("editarUsuarios");
    Route::get('/editarUsuario/{idUsuario}', 'editarUsuariosForm')->middleware(['auth'])->name("editarDatosUsuarios");
    Route::get('/eliminarUsuarioListado', 'eliminarUsuariosListado')->middleware(['auth'])->name("eliminarUsuariosListado");
    Route::get('/eliminarUsuario/{idUsuario}', 'eliminarUsuario')->middleware(['auth'])->name("eliminarUsuario");
    Route::get('/creacionRoles', 'creacionRoles')->middleware(['auth'])->name("creacionRoles");
    Route::post('/guardarRol', 'guardarNuevoRol')->middleware(['auth'])->name("guardarNuevoRol");
    Route::post('/modificar', 'modificacionesRoles')->middleware(['auth'])->name("modificacionesRoles");
    
});

Route::controller(ClientesController::class)->group(function () {
    Route::get('/clientes', 'index')->middleware(['auth'])->name("listadoClientes");
    Route::get('/crear', 'crearClientes')->middleware(['auth'])->name("crearClientes");
    Route::post('/guardarDatos', 'crearClienteDatos')->name("guardarDatosClienteNuevo");
    Route::get('/editar/{idCliente}', 'editarClienteForm')->middleware(['auth'])->name("editarClientes");
    Route::post('/guardarDatosEditar', 'editarDatosCliente')->name("editarDatosClientes");
    Route::get('/eliminar/{idCliente}', 'eliminarCliente')->middleware(['auth'])->name("eliminarClientes");
    Route::get('/pdf', 'exportarPDF')->middleware(['auth'])->name("pdfClientes");
    Route::get('/excel', 'exportarExcel')->middleware(['auth'])->name("excelClientes");
});

Route::controller(ProveedoresController::class)->group(function () {
    Route::get('/proveedores', 'index')->middleware(['auth'])->name("listadoProveedores");
    Route::get('/crearProveedor', 'crearProveedores')->middleware(['auth'])->name("crearProveedores");
    Route::post('/guardarDatosProveedor', 'crearProveedorDatos')->name("guardarDatosProveedorNuevo");
    Route::get('/editarProveedor/{idProveedor}', 'editarProveedorForm')->middleware(['auth'])->name("editarProveedores");
    Route::post('/guardarDatosEditarProveedor', 'editarDatosProveedor')->name("editarDatosProveedores");
    Route::get('/eliminarProveedor/{idProveedor}', 'eliminarProveedores')->middleware(['auth'])->name("eliminarProveedores");
    Route::get('/pdfProveedores', 'exportarPDF')->middleware(['auth'])->name("pdfProveedores");
    Route::get('/excelProveedores', 'exportarExcel')->middleware(['auth'])->name("excelProveedores");
});

Route::controller(DistribuidoresController::class)->group(function () {
    Route::get('/distribuidores', 'index')->middleware(['auth'])->name("listadoDistribuidores");
    Route::get('/crearDistribuidor', 'crearDistribuidores')->middleware(['auth'])->name("crearDistribuidores");
    Route::post('/guardarDatosDistribuidor', 'crearDistribuidorDatos')->name("guardarDatosDistribuidorNuevo");
    Route::get('/editarDistribuidor/{idDistribuidor}', 'editarDistribuidorForm')->middleware(['auth'])->name("editarDistribuidores");
    Route::post('/guardarDatosEditarDistribuidor', 'editarDatosDistribuidor')->name("editarDatosDistribuidores");
    Route::get('/eliminarDistribuidor/{idDistribuidor}', 'eliminarDistribuidor')->middleware(['auth'])->name("eliminarDistribuidores");
    Route::get('/pdfDistribuidores', 'exportarPDF')->middleware(['auth'])->name("pdfDistribuidores");
    Route::get('/excelDistribuidores', 'exportarExcel')->middleware(['auth'])->name("excelDistribuidores");
});

Route::controller(EventosController::class)->group(function () {
    Route::get('/calendario', 'index')->middleware(['auth'])->name("calendario");
    Route::post('/crearEvento', 'crearEvento')->middleware(['auth'])->name("crearEvento");
    Route::post('/crearEventoPeriodico', 'crearEventoPeriodico')->middleware(['auth'])->name("crearEventoPeriodico");
    Route::get('/listadoEventos', 'listadoEventos')->middleware(['auth'])->name("listadoEventos");
    Route::get('/eliminarEvento/{idEvento}', 'eliminarEvento')->middleware(['auth'])->name("eliminarEvento");
    Route::get('/eliminarEventoPeriodico/{idEvento}', 'eliminarEventoPeriodico')->middleware(['auth'])->name("eliminarEventoPeriodico");
    Route::get('/editarEvento/{idEvento}', 'editarEvento')->middleware(['auth'])->name("editarEvento");
    Route::get('/editarEventoPeriodico/{idEvento}', 'editarEventoPeriodico')->middleware(['auth'])->name("editarEventoPeriodico");
    Route::post('/actualizarEvento', 'actualizarDatosEvento')->middleware(['auth'])->name("actualizarEvento");
    Route::post('/actualizarEventoPeriodico', 'actualizarDatosEventoPeriodico')->middleware(['auth'])->name("actualizarEventoPeriodico");
});


Route::controller(ServiciosController::class)->group(function () {
    Route::get('/listadoServicios', 'index')->middleware(['auth'])->name("listadoServicios");
    Route::get('/realizacion/{idServicio}', 'cambiarEstadoServicio')->middleware(['auth'])->name("servicioRealizacion");
    Route::get('/editarServicios/{idServicio}', 'editarServicios')->middleware(['auth'])->name("editarServicios");
    Route::post('/actualizarDatosServicio', 'actualizarServicios')->middleware(['auth'])->name("actualizarServicios");
    Route::get('/pantalla', 'pantalla')->middleware(['auth'])->name("pantalla");
    Route::get('/crearServicio', 'crearServicio')->middleware(['auth'])->name("crearServicio");
    Route::post('/insertarDatos', 'insertarDatos')->middleware(['auth'])->name("insertarDatosServicioNuevo");
    Route::get('/eliminarServicios/{idServicio}', 'eliminarServicios')->middleware(['auth'])->name("eliminarServicios");
    Route::get('/pdfServicios', 'exportarPDF')->middleware(['auth'])->name("pdfServicios");
    Route::get('/excelServicios', 'exportarExcel')->middleware(['auth'])->name("excelServicios"); 
});


Route::controller(PlanesController::class)->group(function () {
    Route::get('/listadoPlanes', 'index')->middleware(['auth'])->name("listadoPlanes");
    Route::get('/crearPlan', 'crearPlan')->middleware(['auth'])->name("crearPlan");
    Route::post('/insertarDatosPlanNuevo', 'insertarDatos')->middleware(['auth'])->name("insertarDatosPlanNuevo");
    Route::get('/editarPlanes/{idPlan}', 'editarPlanes')->middleware(['auth'])->name("editarPlanes");
    Route::post('/actualizarDatosPlan', 'actualizarPlan')->middleware(['auth'])->name("actualizarPlanes");
    Route::get('/eliminarPlanes/{idPlan}', 'eliminarPlan')->middleware(['auth'])->name("eliminarPlanes");
    Route::get('/pdfPlanes', 'exportarPDF')->middleware(['auth'])->name("pdfPlanes");
    Route::get('/excelPlanes', 'exportarExcel')->middleware(['auth'])->name("excelPlanes"); 
});


Route::controller(RenovacionesController::class)->group(function () {
    Route::get('/listadoRenovaciones', 'index')->middleware(['auth'])->name("listadoRenovaciones");
    Route::get('/renovaciones', 'importarRenovaciones')->middleware(['auth'])->name("importarRenovaciones");
    Route::get('/editarRenovaciones/{idRenovacion}', 'editarRenovacion')->middleware(['auth'])->name("editarRenovacion");
    Route::post('/actualizarRenovacion', 'actualizarRenovacion')->middleware(['auth'])->name("actualizarRenovacion");
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
