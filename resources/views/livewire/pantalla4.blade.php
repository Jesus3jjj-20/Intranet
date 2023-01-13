<div wire:poll>

<div class="col">
<div class="card">
        <div class="card-header cabeceraCrearEvento"> 
            <h3 class="mt-2">Recordatorios</h3>
        </div>
        <div class="card-body">
        <div class="container">
            <div class="row">

            
                    @foreach($recordatorios as $recordatorio)
                    <div class="col-sm-12 col-md-6">
                        <div class="cajaRecordatorio" style="background-color: {{$recordatorio->color}}">
                            <div class="row">
                                <span class="tituloRecordatorio"> {{$recordatorio->nombre}}</span>
                            </div>
                            <div class="row">
                                Desde &nbsp; <span class="negrita"> {{ \Carbon\Carbon::parse(strtotime($recordatorio->fecha_inicio))->formatLocalized('%d/%m/%Y') }} {{$recordatorio->hora_inicio}}:{{$recordatorio->minutos_inicio}}</span> hasta &nbsp; <span class="negrita">{{ \Carbon\Carbon::parse(strtotime($recordatorio->fecha_fin))->formatLocalized('%d/%m/%Y') }} {{$recordatorio->hora_fin}}:{{$recordatorio->minutos_fin}}</span>
                            </div>
                            <!--<div class="row">
                            <span class="negrita">Día inicio:</span>  {{ \Carbon\Carbon::parse(strtotime($recordatorio->fecha_inicio))->formatLocalized('%d/%m/%Y') }} 
                            </div>
                            <div class="row">
                            <span class="negrita">Día fin:</span> {{ \Carbon\Carbon::parse(strtotime($recordatorio->fecha_fin))->formatLocalized('%d/%m/%Y') }} 
                            </div>
                            <div class="row">
                            <span class="negrita"> Hora inicio: </span>{{$recordatorio->hora_inicio}}:{{$recordatorio->minutos_inicio}} 
                            </div>
                            <div class="row">
                            <span class="negrita"> Hora fin:</span> {{$recordatorio->hora_fin}}:{{$recordatorio->minutos_fin}} 
                            </div>-->
                        </div>
                    </div>
                    @endforeach


                    @foreach($recordatoriosPeriodicos as $recordatorio)

                        @if(($recordatorio->mes == $mes) &&  ($recordatorio->dia == $hoy))

                        <div class="col-sm-12 col-md-6">
                            <div class="cajaRecordatorio" style="background-color: {{$recordatorio->color}}">
                                <div class="row">
                                    <span class="tituloRecordatorio"> {{$recordatorio->nombre}}</span>
                                </div>
                                <div class="row">
                                <h5>Recordatorio periódico</h5> &nbsp; - &nbsp; {{$recordatorio->dia}} / {{$recordatorio->mes}}
                                </div>
                            </div>
                        </div>

                        @elseif(($recordatorio->mes == null) &&  ($recordatorio->dia == $hoy))
                        <div class="col-sm-12 col-md-6">
                            <div class="cajaRecordatorio" style="background-color: {{$recordatorio->color}}">
                                <div class="row">
                                    <span class="tituloRecordatorio"> {{$recordatorio->nombre}}</span>
                                </div>
                                <div class="row">
                                <h5>Recordatorio periódico</h5> &nbsp; - &nbsp; Día &nbsp; {{$recordatorio->dia}} 
                                </div>
                            </div>
                        </div>

                        @else

                        <div></div>

                        @endif


                        @endforeach

                       

            </div>
        </div>

        </div>
        
    </div>
</div>

</div>