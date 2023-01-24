<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class ListadoClientes extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $buscador;
    public $ordenarCampo = "nombre";
    public $ordenarDireccion = "asc";
    public $icono = "fas fa-arrow-circle-up";
    public $numPaginas = 5;

    public function render()
    {


        $user = Auth::user();
        $clientes = Cliente::select('id','nombre','email')->where("nombre", 'like', '%' . $this->buscador . '%')
        ->orWhere("email", 'like', '%' . $this->buscador . '%')
        ->orWhere("id", 'like', '%' . $this->buscador . '%')
        ->orderBy($this->ordenarCampo, $this->ordenarDireccion)
        ->paginate($this->numPaginas);

        session(['listadoClientes' => $clientes]);

        return view('livewire.listado-clientes',["user"=>$user,"clientes"=>$clientes]);
    }


    public function ordenarPorCampo ($nombreCampo){

        $flechaArriba = "fas fa-arrow-circle-up";
        $flechaAbajo = "fas fa-arrow-circle-down";


        $this->ordenarCampo = $nombreCampo;
        $this->ordenarDireccion = $this->ordenarDireccion == "desc" ? "asc" : "desc";
        $this->icono = $this->icono == $flechaAbajo ? $flechaArriba : $flechaAbajo;

    }

}
