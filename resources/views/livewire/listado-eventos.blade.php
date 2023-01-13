<div>

        <div class="row">

        <div class="col-sm-12 col-md-6">
        <div class="card">
                <div class="card-header cabeceraCrearEvento">
                <div class="row">
                    <div class="col">
                      <h3 class="card-title mt-2">Eventos activos {{$annio}}</h3>
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" name="buscar"  wire:model="buscador1" placeholder="Buscar..." required>
                    </div>
                 
                  </div>

                </div>
                <div class="card-body">
                  <div class="container">
                  @foreach($eventos as $evento)
                  <div class="row mb-2">
                    <div class="col-1" style="background-color: {{$evento->color}}; width: 10px"> </div>
                    <div class="col-5">&nbsp;{{$evento->nombre}}</div>
                    <div class="col-4">&nbsp;{{\Carbon\Carbon::createFromDate($evento->fecha_fin)->format('d-m-Y')}}</div>
                    <div class="col-1"><a href="{{route('editarEvento', ['idEvento'=>$evento->id])}}"><i class="fas fa-edit colorIcono"></i></a></div>
                    <div class="col-1"><a href="{{route('eliminarEvento', ['idEvento'=>$evento->id])}}"><i class="fa fa-trash colorIcono" aria-hidden="true"></i></a></div>
                  </div>
                  @endforeach
                  </div>

                  <div class="paginacion">{{ $eventos->links() }}</div>

                </div>
                
              </div>
        </div>

        <div class="col-sm-12 col-md-6">
        <div class="card">
                <div class="card-header cabeceraCrearEvento">
                  <div class="row">
                    <div class="col">
                      <h3 class="card-title mt-2">Eventos periódicos</h3>
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" name="buscar"  wire:model="buscador2" placeholder="Buscar..." required>
                    </div>
                  </div>
                  
                </div>
                <div class="card-body">

                <div class="container">
                  @foreach($eventosPeriodicos as $evento)
                  <div class="row mb-2">
                    <div class="col-1" style="background-color: {{$evento->color}}; width: 10px"> </div>
                    <div class="col-5">&nbsp;{{$evento->nombre}}</div>
                    <div class="col-4">&nbsp;{{\Carbon\Carbon::createFromDate($evento->fecha_fin)->format('d-m-Y')}}</div>
                    <div class="col-1"><a href="{{route('editarEventoPeriodico', ['idEvento'=>$evento->id])}}"><i class="fas fa-edit colorIcono"></i></a></div>
                    <div class="col-1"><a href="{{route('eliminarEventoPeriodico', ['idEvento'=>$evento->id])}}"><i class="fa fa-trash colorIcono" aria-hidden="true"></i></a></div>
                  </div>
                  @endforeach
                  </div>

                  <div class="paginacion">{{ $eventos->links() }}</div>

                </div>
             
                </div>
              </div>
        </div>
          
        </div>
        <!-- /.row -->
      
</div>
