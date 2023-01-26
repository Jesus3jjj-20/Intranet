<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Renovacion;
use App\Models\Servicio;
use Livewire\WithPagination;


class ListadoRenovaciones extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $mes = "";
    public $numPaginas = 5;

    public function render()
    {

        $user = Auth::user();

        if($this->mes != ""){
            $renovaciones =  Renovacion::where('estado_renovacion_id', "!=", 5)
            ->where('estado_renovacion_id', "!=", 6)
            ->whereMonth('fecha_renovacion', $this->mes)
            ->orderBy("fecha_renovacion", "desc")
            ->paginate($this->numPaginas);

        }else{
            $renovaciones =  Renovacion::where('estado_renovacion_id', "!=", 5)
            ->where('estado_renovacion_id', "!=", 6)
            ->whereMonth('fecha_renovacion', \Carbon\Carbon::now()->format('n'))
            ->orderBy("fecha_renovacion", "desc")
            ->paginate($this->numPaginas);
        }

        
        return view('livewire.listado-renovaciones',['renovaciones'=>$renovaciones,'user'=>$user]);
    }



    public function importarRenovaciones(){

        $mesActual = \Carbon\Carbon::now()->format('n');
        $serviciosMesSiguiente = Servicio::whereMonth('fecha_expiracion', ++$mesActual)->get();

        foreach($serviciosMesSiguiente as $servicio){

            $buscarRenovacion = Renovacion::where("servicio_id",$servicio->id)->count();

            if($buscarRenovacion == 0){

                $renovacion = new Renovacion;

                $renovacion->servicio_id = $servicio->id;
                $renovacion->nPresupuesto = "";
                $renovacion->fecha_renovacion = $servicio->fecha_expiracion;

                $renovacion->save();
            }
        }

        return redirect()->route('listadoRenovaciones');


    }


}
