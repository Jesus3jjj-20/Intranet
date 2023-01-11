<div>
<div class="card-header">
                <div class="row">
                  <div class="col-9">
                  <h3 class="card-title mt-2">Información planes</h3>
                  </div>
                  <div class="col-3">
                  <input type="text" class="form-control" name="buscar"  wire:model="buscador" placeholder="Buscar..." required>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="listadoPlanes" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th># &nbsp;<i class=" {{$icono}} iconoOrdenar" wire:click="ordenarPorCampo('id')"></i></th>
                    <th>Nombre  &nbsp;  <i class=" {{$icono}} iconoOrdenar" wire:click="ordenarPorCampo('nombre')"></i></th>

                    @if($user->rol->admin != 1)
                    <th>Editar</th>
                    <th>Eliminar</th>
                    @endif

                  </tr>
                  </thead>
                  <tbody>
            @foreach($planes as $plan)
                    <tr>
                        <td>{{$plan->id}}</td>
                        <td>{{$plan->nombre}}</td>

                        @if($user->rol->admin != 1)
                        <td><a href="{{route('editarPlanes',['idPlan'=>$plan->id])}}"><i class="fas fa-edit colorIcono"></i></a></td>
                        <td><a href="{{route('eliminarPlanes',['idPlan'=>$plan->id])}}"><i class="fas fa-trash colorIcono" aria-hidden="true"></i></a></td>
                        @endif

                      </tr>
            @endforeach
                  </tfoot>
                </table>
                <div class="paginacion">{{ $planes->links() }}</div>
              </div>
              <!-- /.card-body -->

              <div class="row filaAgregar">
                <div><a href="{{route('crearPlan')}}"><i class="fa fa-plus-circle agregar" aria-hidden="true"></i></a></div>
              </div>

            </div>
            <!-- /.card -->

</div>

