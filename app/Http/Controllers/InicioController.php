<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Cliente;
use App\Models\Distribuidore;
use App\Models\Proveedore;
use App\Models\Evento;
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
        $numeroDistribuidores = Distribuidore::all()->count();
        $numeroProveedores = Proveedore::all()->count();
        $hoy = \Carbon\Carbon::now()->format('Y-m-d');

        $hoyFormatoES = \Carbon\Carbon::now()->format('d-m-Y');

        $numeroEventosHoy = Evento::where('fecha_fin', $hoy)->get()->count();
        $numeroServiciosPendientes = Servicio::where('fecha_expiracion', $hoy)->get()->count();

        $totalNotificaciones = $numeroEventosHoy + $numeroServiciosPendientes;

        $user = Auth::user();
        return view("inicio.inicio", ['user'=> $user, 'hoy'=> $hoyFormatoES, 'totalNotificaciones'=>$totalNotificaciones, 'numeroServiciosPendientes'=> $numeroServiciosPendientes, 'numeroEventosHoy'=> $numeroEventosHoy, 'numeroServicios'=>$numeroServicios, 'numeroClientes'=> $numeroClientes, 'numeroDistribuidores'=> $numeroDistribuidores, 'numeroProveedores'=> $numeroProveedores]);
    }

}
