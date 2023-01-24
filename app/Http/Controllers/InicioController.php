<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Cliente;
use App\Models\Distribuidore;
use App\Models\Proveedor;
use App\Models\Evento;
use App\Models\Tipo;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $numeroServicios = Servicio::all()->count();
        $numeroClientes = Cliente::all()->count();
        $numeroDistribuidores =Distribuidore::all()->count();
        $numeroProveedores = Proveedor::all()->count();
        $hoy = \Carbon\Carbon::now()->format('Y-m-d');

        $hoyFormatoES = \Carbon\Carbon::now()->format('d-m-Y');

        $numeroEventosHoy = Evento::where('fecha_fin', $hoy)->get()->count();
        $numeroServiciosPendientes = Servicio::where('fecha_expiracion', $hoy)->get()->count();

        $totalNotificaciones = $numeroEventosHoy + $numeroServiciosPendientes;

        $tipos = Tipo::orderBy('id','asc')->get();

        $serviciosPorMeses =  Servicio::selectRaw('month(fecha_alta) mes, count(*) servicios')
                            ->groupBy('mes')
                            ->orderBy('mes', 'asc')
                            ->whereYear('fecha_alta',\Carbon\Carbon::now('Y'))
                            ->get();

        $serviciosPorTipos =  Servicio::selectRaw('tipo_id tipo, count(*) servicios')
                            ->groupBy('tipo')
                            ->orderBy('tipo', 'asc')
                            ->whereYear('fecha_alta',\Carbon\Carbon::now('Y'))
                            ->get();


        $ultimosServiciosRegistrados = Servicio::orderBy('id','desc')->take(7)->get();
        $ultimosClientesRegistrados = Cliente::orderBy('id','desc')->take(7)->get();
        $ultimosDistribuidoresRegistrados = Distribuidore::orderBy('id','desc')->take(7)->get();
        $ultimosProveedoresRegistrados = Proveedor::orderBy('id','desc')->take(7)->get();

        $user = Auth::user();
        return view("inicio.inicio", ['ultimosProveedores'=>$ultimosProveedoresRegistrados,'ultimosDistribuidores'=>$ultimosDistribuidoresRegistrados,'ultimosClientes'=> $ultimosClientesRegistrados, 'ultimosServicios'=>$ultimosServiciosRegistrados,'tipos'=>$tipos, 'serviciosPorTipos'=> $serviciosPorTipos, 'serviciosPorMeses'=> $serviciosPorMeses ,'user'=> $user, 'hoy'=> $hoyFormatoES, 'totalNotificaciones'=>$totalNotificaciones, 'numeroServiciosPendientes'=> $numeroServiciosPendientes, 'numeroEventosHoy'=> $numeroEventosHoy, 'numeroServicios'=>$numeroServicios, 'numeroClientes'=> $numeroClientes, 'numeroDistribuidores'=> $numeroDistribuidores, 'numeroProveedores'=> $numeroProveedores]);
    }

}
