<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\EventosPeriodico;
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
        $eventosPeriodicos = EventosPeriodico::all();
        
        return view("eventos.calendario",['user'=>$user,'eventos'=>$eventos,'eventosPeriodicos'=>$eventosPeriodicos]);
    }

    public function crearEvento(Request $request){

        $fechaInicio = \Carbon\Carbon::parse($request->fechaInicio);
        $fechaFin = \Carbon\Carbon::parse($request->fechaFin);


        $todoDia = ($request->diaEntero == "on") ? "true" : "false";
        
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
            $evento->hora_inicio =  $request->horaInicio;
            $evento->minutos_inicio =  $request->minInicio;
            $evento->hora_fin =  $request->horaFin;
            $evento->minutos_fin =  $request->minFin;

            $evento->save();
 

        return redirect()->back(); 
    }


    public function crearEventoPeriodico(Request $request){

            $eventoPeriodico = new EventosPeriodico;
            $eventoPeriodico->nombre = $request->nombreEvento;
            $eventoPeriodico->color = $request->colorEvento;
            $eventoPeriodico->dia = $request->dia;
            $eventoPeriodico->mes = $request->mes;

            $eventoPeriodico->save();

            return redirect()->back(); 
    }

    public function listadoEventos(){
        $user = Auth::user();
        return view('eventos.listadoEventos',['user'=>$user]);
    }

    public function eliminarEvento($idEvento){
        Evento::where("id",$idEvento)->delete();
        return redirect()->back();
    }

    public function eliminarEventoPeriodico($idEvento){
        EventosPeriodico::where("id",$idEvento)->delete();
        return redirect()->back();
    }


    public function editarEvento($idEvento){
        $user = Auth::user();
        $evento = Evento::where("id",$idEvento)->firstOrFail();

        return view('eventos.editarEvento',['user'=>$user,'evento'=>$evento]);
    }


    public function editarEventoPeriodico($idEvento){

        $user = Auth::user();
        $eventoPeriodico = EventosPeriodico::where("id",$idEvento)->firstOrFail();

        return view('eventos.editarEventoPeriodico',['user'=>$user,'evento'=>$eventoPeriodico]);

    }

    public function actualizarDatosEvento(Request $request){

        $fechaInicio = \Carbon\Carbon::parse($request->fechaInicio);
        $fechaFin = \Carbon\Carbon::parse($request->fechaFin);


        Evento::where('id', $request->idOculto)
        ->update(['nombre' => $request->nombreEvento, 'color'=>$request->colorEvento,'fecha_inicio'=>$request->fechaInicio, 'dia_inicio'=>$fechaInicio->day, 'mes_inicio'=>$fechaInicio->month - 1, 'annio_inicio'=>$fechaInicio->year, 'hora_inicio'=>intval($request->horaInicio), 'minutos_inicio'=>intval($request->minInicio), 'fecha_fin'=>$request->fechaFin, 'dia_fin'=>$fechaFin->day, 'mes_fin'=>$fechaFin->month - 1, 'annio_fin'=>$fechaFin->year, 'hora_fin'=>intval($request->horaFin), 'minutos_fin'=>intval($request->minutos_fin), 'descripcion'=>$request->descripcionEvento]);

        return redirect()->back();
    }

    public function actualizarDatosEventoPeriodico(Request $request){

        EventosPeriodico::where('id', $request->idOculto)
        ->update(['nombre' => $request->nombreEvento, 'color'=>$request->colorEvento, 'dia'=>$request->dia, 'mes'=>$request->mes, 'descripcion'=>$request->descripcionEvento]);

        return redirect()->back();

    }


}
