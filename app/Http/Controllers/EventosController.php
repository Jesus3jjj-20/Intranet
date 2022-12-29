<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use Illuminate\Support\Facades\Auth;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $eventos = Evento::all();
        return view("inicio.calendario",['user'=>$user,'eventos'=>$eventos]);
    }

    public function crearEvento(Request $request){


        $fechaInicio = \Carbon\Carbon::parse($request->fechaInicio);
        $fechaFin = \Carbon\Carbon::parse($request->fechaFin);


        $todoDia = ($request->diaEntero == "on") ? "true" : "false";
        
        if(isset($request->nombreEvento)){
            $evento = new Evento;
            $evento->nombre = $request->nombreEvento;
            $evento->color = $request->colorEvento;
            $evento->fecha_inicio =  $fechaInicio;
            $evento->dia_inicio = $fechaInicio->day;
            $evento->mes_inicio = $fechaInicio->month - 1;
            $evento->annio_inicio = $fechaInicio->year;
            $evento->fecha_fin =  $fechaFin;
            $evento->dia_fin =  $fechaFin->day;
            $evento->mes_fin =  $fechaFin->month - 1;
            $evento->annio_fin =  $fechaFin->year;
            $evento->todo_dia =  $todoDia;
            $evento->save();
        }

        return redirect()->back(); 
    }

    
}
