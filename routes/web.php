<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DistribuidoresController;
use App\Http\Controllers\ProveedoresController;

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

Route::controller(InicioController::class)->group(function () {
    Route::get('/calendario', 'calendario')->middleware(['auth'])->name("calendario");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';