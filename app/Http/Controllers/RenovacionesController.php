<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Renovacion;
use App\Models\EstadoRenovacion;

class RenovacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
               
       $user = Auth::user();

       return view('renovaciones.listadoRenovaciones',['user'=>$user]);


    }

    public function editarRenovacion($idRenovacion){

        $user = Auth::user();
        $renovacion = Renovacion::find($idRenovacion);
        $estados = EstadoRenovacion::all();

        return view("renovaciones.editarRenovacion",["renovacion"=> $renovacion, "user"=> $user, "estados" => $estados]);

    }


    public function actualizarRenovacion(Request $request){

        Renovacion::where('id', $request->idOculto)
        ->update([
               'nPresupuesto'=> $request->numeroPresupuesto,
               'estado_renovacion_id'=> $request->estado,
        ]);

        return redirect()->back();

    }

}
