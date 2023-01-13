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

    @livewireStyles
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

    <div class="row-fluid mb-2">


    <livewire:pantalla />


    </div>
    </div>
    
</div>

@livewireScripts
</body>
</html>