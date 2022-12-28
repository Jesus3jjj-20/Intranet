<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Distribuidore;
use Illuminate\Support\Facades\Auth;

class ListadoDistribuidores extends Component
{
    public $buscador;
    public $ordenarCampo = "nombre";
    public $ordenarDireccion = "asc";
    public $icono = "fas fa-arrow-circle-up";
    public $numPaginas = 5;

    public function render()
    {

        $user = Auth::user();
        $distribuidores = Distribuidore::where("nombre", 'like', '%' . $this->buscador . '%')
        ->orWhere("id", 'like', '%' . $this->buscador . '%')
        ->orderBy($this->ordenarCampo, $this->ordenarDireccion)
        ->paginate($this->numPaginas);

        session(['listadoDistribuidores' => $distribuidores]);

        return view('livewire.listado-distribuidores',["user"=>$user, "distribuidores"=>$distribuidores]);
    }

    
    public function ordenarPorCampo ($nombreCampo){

        $flechaArriba = "fas fa-arrow-circle-up";
        $flechaAbajo = "fas fa-arrow-circle-down";


        $this->ordenarCampo = $nombreCampo;
        $this->ordenarDireccion = $this->ordenarDireccion == "desc" ? "asc" : "desc";
        $this->icono = $this->icono == $flechaAbajo ? $flechaArriba : $flechaAbajo;

    }
    
}
