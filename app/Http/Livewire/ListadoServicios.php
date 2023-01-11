<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Servicio;

class ListadoServicios extends Component
{

    public $buscador;
    public $ordenarCampo = "servicio";
    public $ordenarDireccion = "asc";
    public $icono = "fas fa-arrow-circle-up";
    public $numPaginas = 5;

    public function render()
    {
        $user = Auth::user();
        $servicios = Servicio::select('id','servicio')->where("servicio", 'like', '%' . $this->buscador . '%')
        ->orWhere("id", 'like', '%' . $this->buscador . '%')
        ->orderBy($this->ordenarCampo, $this->ordenarDireccion)
        ->paginate($this->numPaginas);

        session(['listadoServicios' => $servicios]);

        return view('livewire.listado-servicios',["user"=>$user, "servicios"=>$servicios]);
    }


    public function ordenarPorCampo ($nombreCampo){

        $flechaArriba = "fas fa-arrow-circle-up";
        $flechaAbajo = "fas fa-arrow-circle-down";


        $this->ordenarCampo = $nombreCampo;
        $this->ordenarDireccion = $this->ordenarDireccion == "desc" ? "asc" : "desc";
        $this->icono = $this->icono == $flechaAbajo ? $flechaArriba : $flechaAbajo;

    }

}
