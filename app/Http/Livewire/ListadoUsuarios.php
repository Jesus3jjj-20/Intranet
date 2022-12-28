<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ListadoUsuarios extends Component
{

    public $buscador;
    public $ordenarCampo = "name";
    public $ordenarDireccion = "desc";
    public $icono = "fas fa-arrow-circle-up";
    public $numPaginas = 5;

    public function render()
    {

        $user = Auth::user();
        $usuarios = User::where("name", 'like', '%' . $this->buscador . '%')
        ->orWhere("id", 'like', '%' . $this->buscador . '%')
        ->orWhere("email", 'like', '%' . $this->buscador . '%')
        ->orderBy($this->ordenarCampo, $this->ordenarDireccion)
        ->paginate($this->numPaginas);

        session(['listadoUsuarios' => $usuarios]);

        return view('livewire.listado-usuarios',["user"=>$user, "usuarios"=> $usuarios]);
    }

    public function ordenarPorCampo ($nombreCampo){

        $flechaArriba = "fas fa-arrow-circle-up";
        $flechaAbajo = "fas fa-arrow-circle-down";


        $this->ordenarCampo = $nombreCampo;
        $this->ordenarDireccion = $this->ordenarDireccion == "desc" ? "asc" : "desc";
        $this->icono = $this->icono == $flechaAbajo ? $flechaArriba : $flechaAbajo;

    }

}
