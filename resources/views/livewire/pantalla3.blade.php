<div wire:poll>

<div class="col">
    
<div class="card">
                <div class="card-header cabeceraCrearEvento"> 
                      <h3 class="mt-2">Otras renovaciones</h3>
                </div>
                <div class="card-body">
                  <div class="container">
                        <div class="row titulosTabla">
                            <div class="col">Servicio</div>
                            <div class="col">Cliente</div>
                           <!-- <div class="col">Fecha</div> -->
                            <div class="col">Estado</div>
                            <div class="col">Días</div>
                        </div>

                        @foreach($otrosServicios as $servicio)


                        @if(strpos(\Carbon\Carbon::createFromFormat('Y-m-d', $servicio->fecha_expiracion)->diffForHumans(\Carbon\Carbon::now()->format('Y-m-d')) , "hora") == true)
                        <div class="row filasTabla" style="background-color:red; color:white;">
                            <div class="col">{{$servicio->servicio}}</div>
                            <div class="col">{{$servicio->cliente->nombre}}</div>
                           <!-- <div class="col">{{\Carbon\Carbon::parse(strtotime($servicio->fecha_expiracion))->formatLocalized('%d/%m/%Y') }} </div> -->
                            <div class="col">{{$servicio->estado->nombre}}</div>
                            <div class="col">Expira hoy</div>
                        </div>

                        @elseif(strpos(\Carbon\Carbon::createFromFormat('Y-m-d', $servicio->fecha_expiracion)->diffForHumans(\Carbon\Carbon::now()->format('Y-m-d')) , "día") == true)
                        
                        <div class="row filasTabla" style="background-color:red; color:white;">
                            <div class="col">{{$servicio->servicio}}</div>
                            <div class="col">{{$servicio->cliente->nombre}}</div>
                           <!-- <div class="col">{{\Carbon\Carbon::parse(strtotime($servicio->fecha_expiracion))->formatLocalized('%d/%m/%Y') }} </div> -->
                            <div class="col">{{$servicio->estado->nombre}}</div>
                            <div class="col">Expira en {{str_replace("después","",\Carbon\Carbon::createFromFormat('Y-m-d', $servicio->fecha_expiracion)->diffForHumans(\Carbon\Carbon::now()->format('Y-m-d')))}}</div>
                            

                        </div>


                        @else

                        <div class="row filasTabla">
                            <div class="col">{{$servicio->servicio}}</div>
                            <div class="col">{{$servicio->cliente->nombre}}</div>
                           <!-- <div class="col">{{\Carbon\Carbon::parse(strtotime($servicio->fecha_expiracion))->formatLocalized('%d/%m/%Y') }} </div> -->
                            <div class="col">{{$servicio->estado->nombre}}</div>


                            @if(strpos(\Carbon\Carbon::createFromFormat('Y-m-d', $servicio->fecha_expiracion)->diffForHumans(\Carbon\Carbon::now()->format('Y-m-d')) , "semana") == true)
                            <div class="col" style="color: orange;">Expira en {{str_replace("después","",\Carbon\Carbon::createFromFormat('Y-m-d', $servicio->fecha_expiracion)->diffForHumans(\Carbon\Carbon::now()->format('Y-m-d')))}}</div>
                            @endif

                            @if(strpos(\Carbon\Carbon::createFromFormat('Y-m-d', $servicio->fecha_expiracion)->diffForHumans(\Carbon\Carbon::now()->format('Y-m-d')) , "mes") == true)
                            <div class="col" style="color: green;">Expira en {{str_replace("después","",\Carbon\Carbon::createFromFormat('Y-m-d', $servicio->fecha_expiracion)->diffForHumans(\Carbon\Carbon::now()->format('Y-m-d')))}}</div>
                            @endif

                            @if(strpos(\Carbon\Carbon::createFromFormat('Y-m-d', $servicio->fecha_expiracion)->diffForHumans(\Carbon\Carbon::now()->format('Y-m-d')) , "año") == true)
                            <div class="col" style="color: blue;">Expira en {{str_replace("después","",\Carbon\Carbon::createFromFormat('Y-m-d', $servicio->fecha_expiracion)->diffForHumans(\Carbon\Carbon::now()->format('Y-m-d')))}}</div>
                            @endif

                        </div>


                        @endif


                  
                        @endforeach

                       

                  </div>


                </div>
                
              </div>
        </div>


</div>




</div>

</div>