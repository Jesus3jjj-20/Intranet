<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Servicio;
use App\Models\Evento;
use Carbon\Carbon;

class Pantalla extends Component
{

    public function render()
    {

        $hoy = \Carbon\Carbon::now()->format('Y-m-d');
        $serviciosDominiosHostingsSSL = Servicio::where('tipo_id',1)->orWhere('tipo_id',2)->where('fecha_expiracion', '>=', $hoy)->orderBy('fecha_expiracion','asc')->take(11)->get();
        $serviciosMicrosft = Servicio::where('tipo_id',3)->where('fecha_expiracion', '>=', $hoy)->orderBy('fecha_expiracion','asc')->take(11)->get();
        $otrosServicios = Servicio::where('tipo_id', "!=" ,1)->where('tipo_id', "!=" , 2)->where('tipo_id', "!=" ,3)->where('fecha_expiracion', '>=', $hoy)->orderBy('fecha_expiracion','asc')->take(11)->get();
        $recordatorios = Evento::where('fecha_inicio', '<=', $hoy)
                        ->where('fecha_fin', '>=', $hoy)
                        ->get();


        Carbon::setLocale('es');

        return view('livewire.pantalla',['recordatorios'=>$recordatorios, 'otrosServicios'=> $otrosServicios, 'serviciosMicrosoft'=>$serviciosMicrosft, 'serviciosDominiosHostingsSSL' => $serviciosDominiosHostingsSSL]);

    }
}
