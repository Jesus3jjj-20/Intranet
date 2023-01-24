@extends('layouts.plantilla')

@section('titulo', 'Controlsys S.L - BBDD')
@section('nombreUsuario', $user->name)


@section('contenido')


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$numeroServicios}}</h3>

                <p>Servicios</p>
              </div>
              <div class="icon">
              <i class="fas fa fa-star"></i>
              </div>
              <a href="{{route('listadoServicios')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$numeroClientes}}</h3>

                <p>Clientes</p>
              </div>
              <div class="icon">
                <i class="fas fa-sharp fa-solid fa-users"></i>
              </div>
              <a href="{{route('listadoClientes')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$numeroDistribuidores}}</h3>

                <p>Distribuidores</p>
              </div>
              <div class="icon">
                <i class="fas fa-bars"></i>
              </div>
              <a href="{{route('listadoDistribuidores')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$numeroProveedores}}</h3>

                <p>Proveedores</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-square"></i>
              </div>
              <a href="{{route('listadoProveedores')}}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
                          
               
          

        <!-- Main row -->
        <div class="row">


          <div class="col-sm-12 col-md-6 connectedSortable">

            <div class="card contenedorTareasPendientes">
              <div class="card-header cabeceraCrearEvento">
                <div class="row">
                  <h4 class="tituloTareasPendientes">Tareas pendientes hoy</h4>
                  </div>
                <div class="row">
                    <p>{{$hoy}}<p>
                </div>
              </div>
                
              <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                      <span class="tareasPendientes">{{$numeroEventosHoy}}</span> eventos tienen lugar
                    </div>
                    <div class="col-md-3">
                      <a href="{{route('listadoEventos')}}"><button type="button" class="btn btn-warning botonTareas">Ir a eventos</button></a>
                    </div>
                </div>

                <div class="row mt-3">
                  <div class="col-md-9">
                    <span class="tareasPendientes">{{$numeroServiciosPendientes}}</span> servicios finalizan
                  </div>
                  <div class="col-md-3">
                  <a href="{{route('listadoServicios')}}"><button type="button" class="btn btn-warning botonTareas">Ir a servicios</button></a>
                  </div>
                </div>


              </div>
            </div>

            <div class="card" id="contenedorGraficos">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Servicios
                </h3>

                <div class="card-tools">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#contenedorGraph" data-toggle="tab">Año</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contenedorCirculo" data-toggle="tab">Tipos</a></li>
                  
                  </ul>
                </div>

              </div><!-- /.card-header -->


                <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="active tab-pane" id="contenedorGraph">
                      <canvas id="graph" height="300" style="height: 300px;"></canvas>
                   </div>
                  <div class="tab-pane" id="contenedorCirculo">
                    <canvas id="circulo" height="300" style="height: 300px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->

            </div>
            <!-- /.card -->

          </div>
          

          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-sm-12 col-md-6 connectedSortable">

           <!-- Calendar -->
           <div class="card bg-gradient-success contenedorCalendario">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendario
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="{{route('calendario')}}" class="dropdown-item">Ver eventos</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          

            <!-- Map card -->
            <div class="card bg-gradient-primary" id="mapaOculto">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Visitors
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                
                </div>
                <!-- /.card-tools -->
              </div>
             
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->


            <div class="card" id="contenedorEntradas">
              <div class="card-header">
                <h3 class="card-title">
                <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                  Últimos registros
                </h3>

                <div class="card-tools">
                  <ul class="nav nav-pills mt-3">
                    <li class="nav-item"><a class="nav-link active" href="#contenedorServicios" data-toggle="tab">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contenedorClientes" data-toggle="tab">Clientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contenedorDistribuidores" data-toggle="tab">Distribuidores</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contenedorProveedores" data-toggle="tab">Proveedores</a></li>
                  </ul>
                </div>

              </div><!-- /.card-header -->


                <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="active tab-pane" id="contenedorServicios">
                  
                  <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Servicio</th>
                                        @if($user->rol->admin != 1)
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                        @endif

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ultimosServicios as $servicio)
                                        <tr>
                                            <td>{{$servicio->id}}</td>
                                            <td>{{$servicio->servicio}}</td>

                                            @if($user->rol->admin != 1)
                                            <td><a href="{{route('editarServicios',['idServicio'=>$servicio->id])}}"><i class="fas fa-edit colorIcono"></i></a></td>
                                            <td><a href="{{route('eliminarServicios',['idServicio'=>$servicio->id])}}"><i class="fas fa-trash colorIcono" aria-hidden="true"></i></a></td>
                                            @endif
                                        </tr>
                                        @endforeach

                                    </tfoot>
                  </table>


                  </div>
                  <div class="tab-pane" id="contenedorClientes">

                  <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Servicio</th>
                                        @if($user->rol->admin != 1)
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                        @endif

                                    </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($ultimosClientes as $cliente)
                                          <tr>
                                              <td>{{$cliente->id}}</td>
                                              <td>{{$cliente->nombre}}</td>

                                              @if($user->rol->admin != 1)
                                              <td><a href="{{route('editarClientes',['idCliente'=>$cliente->id])}}"><i class="fas fa-edit colorIcono"></i></a></td>
                                              <td><a href="{{route('eliminarClientes',['idCliente'=>$cliente->id])}}"><i class="fas fa-trash colorIcono" aria-hidden="true"></i></a></td>
                                              @endif
                                          </tr>
                                          @endforeach

                                    </tfoot>
                   </table>
                    
                  </div>
                  <div class="tab-pane" id="contenedorDistribuidores">

                  <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Servicio</th>
                                        @if($user->rol->admin != 1)
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                        @endif

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ultimosDistribuidores as $distribuidor)
                                          <tr>
                                              <td>{{$distribuidor->id}}</td>
                                              <td>{{$distribuidor->nombre}}</td>

                                              @if($user->rol->admin != 1)
                                              <td><a href="{{route('editarDistribuidores',['idDistribuidor'=>$distribuidor->id])}}"><i class="fas fa-edit colorIcono"></i></a></td>
                                              <td><a href="{{route('eliminarDistribuidores',['idDistribuidor'=>$distribuidor->id])}}"><i class="fas fa-trash colorIcono" aria-hidden="true"></i></a></td>
                                              @endif
                                              
                                            </tr>
                                     @endforeach

                                    </tfoot>
                  </table>
                    
                  </div>
                  <div class="tab-pane" id="contenedorProveedores">

                  <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Servicio</th>
                                        @if($user->rol->admin != 1)
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                        @endif

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ultimosProveedores as $proveedor)
                                            <tr>
                                                <td>{{$proveedor->id}}</td>
                                                <td>{{$proveedor->nombre}}</td>

                                                @if($user->rol->admin != 1)
                                                <td><a href="{{route('editarProveedores',['idProveedor'=>$proveedor->id])}}"><i class="fas fa-edit colorIcono"></i></a></td>
                                                <td><a href="{{route('eliminarProveedores',['idProveedor'=>$proveedor->id])}}"><i class="fas fa-trash colorIcono" aria-hidden="true"></i></a></td>
                                                @endif

                                              </tr>
                                    @endforeach

                                    </tfoot>
                                    </table>
                    
                  </div>
                </div>
              </div><!-- /.card-body -->

            </div>
            <!-- /.card -->



          </section>
          <!-- right col -->
        </div>

            
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>

    /*Gráfico servicios barras*/ 
    const labels = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    const colors = ['rgb(69,177,223)', 'rgb(99,201,122)', 'rgb(203,82,82)', 'rgb(229,224,88)' , '#90bc41', '#e8b334'];
     
    const graph = document.querySelector("#graph");
     
    const data = {
        labels: labels,
        datasets: [{
            label:"Cantidad de servicios",
            data: 
            <?php

              $arrayMeses = [0,0,0,0,0,0,0,0,0,0,0,0];     

              for($i = 0; $i<count($serviciosPorMeses); $i++){
                    $arrayMeses[--$serviciosPorMeses[$i]->mes] = $serviciosPorMeses[$i]->servicios;
              }

              echo "[" . implode(",", $arrayMeses) . "]";

            ?>,
            backgroundColor: '#90bc41'
        }]
    };
     
    const config1 = {
        type: 'bar',
        data: data,
    options: {
        scales:{ 
            yAxes:[{ 
                ticks: { 
                    beginAtZero:true 
                } 
            }] 
          } 
    }
    };
     
    new Chart(graph, config1);


    const labels2 = [

      <?php 

      echo "'" . isset($tipo[0]) ? $tipos[0]->nombre : '' . "'";

        for($i=1; $i<count($tipos); $i++){
          echo "," . "'". isset($tipo[$i]) ? $tipos[0]->nombre : '' . "'";
        }

      ?>

    ];

    /*Gráfico servicios barras*/ 
     
    const circulo = document.querySelector("#circulo");
     
    const data2 = {
          labels: labels2,
          datasets: [{
              data: [

      <?php
          echo isset($serviciosPorTipos[0]) ? $serviciosPorTipos[0]->nombre : '';

          for($i=1; $i< count($serviciosPorTipos); $i++){
              echo "," . isset($serviciosPorTipos[$i]) ? $serviciosPorTipos[0]->nombre : '';
          }

      ?>

      ],
              backgroundColor: colors
          }]
      };
     
    const config2 = {
        type: 'pie',
        data: data2,
    };
     
    new Chart(circulo, config2);

    </script>
  
@endsection