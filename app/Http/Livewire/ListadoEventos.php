<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Evento;
use App\Models\EventosPeriodico;
use Livewire\WithPagination;

class ListadoEventos extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $buscador1;
    public $buscador2;

    public function render()
    {
            $annio = date('Y');
            $eventos = Evento::where('annio_inicio', $annio)->where("nombre", 'like', '%' . $this->buscador1 . '%')->orderBy('fecha_fin','asc')->paginate(10);
            $eventosPeriodicos = EventosPeriodico::where("nombre", 'like', '%' . $this->buscador2 . '%')->paginate(10);
            return view('livewire.listado-eventos',['annio'=>$annio,'eventos'=>$eventos,'eventosPeriodicos'=>$eventosPeriodicos]);
    }

}
