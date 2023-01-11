<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla - Controlsys S.L</title>
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">
</head>
<body>

<div class="contenedorPantalla">

<div class="container-fluid">

    <div class="row filaEncabezado">
        <div class="col-sm-12 col-md-6">
            <div class="tituloPantalla">eServices</div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="fechaPantalla">{{$diaSemana}} {{$diaNumero}} de {{$mes}} de {{$annio}}</div>
        </div>
    </div>

    <div class="row mb-2">


        <div class="col-sm-12 col-md-6">
        <div class="card">
                <div class=" card-header cabeceraCrearEvento" style="font-weigth: bold"> 
                      <h3 class="mt-2">Dominios, Hostings y Certificados SSL</h3>
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

                        @foreach($serviciosDominiosHostingsSSL as $servicio)


                        @if(strpos(\Carbon\Carbon::createFromFormat('Y-m-d', $servicio->fecha_expiracion)->diffForHumans(\Carbon\Carbon::now()->format('Y-m-d')) , "día") == true)
                        
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

        <div class="col-sm-12 col-md-6">
            <div class="card">
                    <div class="card-header cabeceraCrearEvento">
                        <h3 class="mt-2">Microsoft</h3>
                    
                    </div>
                    <div class="card-body">

                    <div class="container">
                    <div class="row titulosTabla">
                            <div class="col">Servicio</div>
                            <div class="col">Cliente</div>
                            <!--<div class="col">Fecha</div>-->
                            <div class="col">Estado</div>
                            <div class="col">Días</div>
                    </div>

                    @foreach($serviciosMicrosoft as $servicio)


                        @if(strpos(\Carbon\Carbon::createFromFormat('Y-m-d', $servicio->fecha_expiracion)->diffForHumans(\Carbon\Carbon::now()->format('Y-m-d')) , "día") == true)
                        
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



<div class="row">


<div class="col-sm-12 col-md-6">
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
            </div>
        </div>

        </div>
        
    </div>
</div>



<div class="col-sm-12 col-md-6">
    
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


                        @if(strpos(\Carbon\Carbon::createFromFormat('Y-m-d', $servicio->fecha_expiracion)->diffForHumans(\Carbon\Carbon::now()->format('Y-m-d')) , "día") == true)
                        
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
    
</div>



</body>
</html>