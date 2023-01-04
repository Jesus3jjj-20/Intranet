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
                <div class="card-header cabeceraCrearEvento"> 
                      <h3 class="card-title mt-2">Renovaciones Dominios</h3>
                </div>
                <div class="card-body">
                  <div class="container">
                        <div class="row titulosTabla">
                            <div class="col">Servicio</div>
                            <div class="col">Cliente</div>
                            <div class="col">Fecha</div>
                            <div class="col">Estado</div>
                            <div class="col">Días</div>
                        </div>

                  </div>

                  <div class="paginacion"></div>

                </div>
                
              </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="card">
                    <div class="card-header cabeceraCrearEvento">
                        <h3 class="card-title mt-2">Renovaciones Hostings</h3>
                    
                    </div>
                    <div class="card-body">

                    <div class="container">
                    <div class="row titulosTabla">
                            <div class="col">Servicio</div>
                            <div class="col">Cliente</div>
                            <div class="col">Fecha</div>
                            <div class="col">Estado</div>
                            <div class="col">Días</div>
                    </div>

                    <div class="row filasTabla">
                            <div class="col">Renovación</div>
                            <div class="col">ACESUR</div>
                            <div class="col">06/01/2023</div>
                            <div class="col">Activo</div>
                            <div class="col">3 días</div>
                    </div>
                
                    </div>

                    <div class="paginacion"></div>

                    </div>
                
                    </div>
                </div>
            </div>



        <div class="row mb-2">


            <div class="col-sm-12 col-md-6">
            <div class="card">
                    <div class="card-header cabeceraCrearEvento"> 
                        <h3 class="card-title mt-2">Renovaciones Microsoft</h3>
                    </div>
                    <div class="card-body">
                    <div class="container">

                    <div class="row titulosTabla">
                            <div class="col">Servicio</div>
                            <div class="col">Cliente</div>
                            <div class="col">Fecha</div>
                            <div class="col">Estado</div>
                            <div class="col">Días</div>
                        </div>

                    </div>

                    <div class="paginacion"></div>

                    </div>
                    
                </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div class="card">
                        <div class="card-header cabeceraCrearEvento">
                            <h3 class="card-title mt-2">Otras renovaciones</h3>
                        
                        </div>
                        <div class="card-body">

                        <div class="container">
                            
                        <div class="row titulosTabla">
                            <div class="col">Servicio</div>
                            <div class="col">Cliente</div>
                            <div class="col">Fecha</div>
                            <div class="col">Estado</div>
                            <div class="col">Días</div>
                        </div>
                        

                        </div>

                        <div class="paginacion"></div>

                        </div>
                    
                        </div>
                    </div>
            </div>



            <div class="row">


            <div class="col-sm-12">
            <div class="card">
                    <div class="card-header cabeceraCrearEvento"> 
                        <h3 class="card-title mt-2">Recordatorios</h3>
                    </div>
                    <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-1">1: </div>
                            <div class="col-11">Facturar</div>
                        </div>
                    </div>

                    <div class="paginacion"></div>

                    </div>
                    
                </div>
            </div>

            </div>

    </div>
    
</body>
</html>