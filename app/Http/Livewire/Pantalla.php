<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Servicio;
use App\Models\Evento;
use App\Models\EventosPeriodico;
use Carbon\Carbon;

class Pantalla extends Component
{

    public $pantallas = ['livewire.pantalla','livewire.pantalla2','livewire.pantalla3','livewire.pantalla4'];
    public $i = -1;

    public function render()
    {

        if($this->i == 3){
            $this->i = -1;
        }

        $this->i += 1;

        $hoy = \Carbon\Carbon::now()->format('Y-m-d');
        $diaNumero = \Carbon\Carbon::now()->format('d');
        $mes = \Carbon\Carbon::now()->format('n');

        $serviciosDominiosHostingsSSL = Servicio::where('fecha_expiracion', '>=', $hoy)
                                                  ->where(function($query){

                                                    $query->where('tipo_id',1)
                                                           ->orWhere('tipo_id',2)
                                                           ->orWhere('tipo_id',7);
                                                  })
        ->orderBy('fecha_expiracion','asc')->take(11)->get();

        
        $serviciosMicrosft = Servicio::where('tipo_id',3)->where('fecha_expiracion', '>=', $hoy)->orderBy('fecha_expiracion','asc')->take(11)->get();
        $otrosServicios = Servicio::where('tipo_id', "!=" ,1)->where('tipo_id', "!=" , 2)->where('tipo_id', "!=" ,3)->where('tipo_id', "!=" ,7)->where('fecha_expiracion', '>=', $hoy)->orderBy('fecha_expiracion','asc')->take(11)->get();
        $recordatorios = Evento::where('fecha_inicio', '<=', $hoy)
                        ->where('fecha_fin', '>=', $hoy)
                        ->get();

        $recordatoriosPeriodicos = EventosPeriodico::where('dia', $diaNumero)
                        ->get();


        Carbon::setLocale('es');



        return view($this->pantallas[$this->i],['hoy'=> $diaNumero, 'mes'=> $mes,'recordatoriosPeriodicos'=> $recordatoriosPeriodicos, 'recordatorios'=>$recordatorios, 'otrosServicios'=> $otrosServicios, 'serviciosMicrosoft'=>$serviciosMicrosft, 'serviciosDominiosHostingsSSL' => $serviciosDominiosHostingsSSL]);

    }

}
