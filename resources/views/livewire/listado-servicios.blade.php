<div class="card-header">
                <div class="row">
                  <div class="col-md-9">
                    <h3 class="card-title mt-2">Listado servicios</h3>
                  </div>
                  <div class="col-md-3">
                    <input type="text" class="form-control" name="buscar"  wire:model="buscador" placeholder="Buscar..." required>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                    <table id="listadoClientes" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#  &nbsp; <i class="{{$icono}} iconoOrdenar" wire:click="ordenarPorCampo('id')"></i></th>
                                        <th>Servicio &nbsp;  <i class="{{$icono}} iconoOrdenar" wire:click="ordenarPorCampo('servicio')"></i></th>

                                        @if($user->rol->admin != 1)
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                        @endif

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($servicios as $servicio)
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
                                    <div class="paginacion">{{ $servicios->links() }}</div>
                                    </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

