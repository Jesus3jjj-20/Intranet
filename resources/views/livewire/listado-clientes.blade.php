
<div class="card-header">
                <div class="row">
                  <div class="col-md-9">
                    <h3 class="card-title mt-2">Información clientes</h3>
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
                                        <th>Nombre &nbsp;  <i class="{{$icono}} iconoOrdenar" wire:click="ordenarPorCampo('nombre')"></i></th>
                                        <th>Email &nbsp; <i class="{{$icono}} iconoOrdenar" wire:click="ordenarPorCampo('email')"></i></th>

                                        @if($user->rol->admin != 1)
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                        @endif

                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($clientes as $cliente)
                                        <tr>
                                            <td>{{$cliente->id}}</td>
                                            <td>{{$cliente->nombre}}</td>
                                            <td>{{$cliente->email}}</td>

                                            @if($user->rol->admin != 1)
                                            <td><a href="{{route('editarClientes',['idCliente'=>$cliente->id])}}"><i class="fas fa-edit colorIcono"></i></a></td>
                                            <td><a href="{{route('eliminarClientes',['idCliente'=>$cliente->id])}}"><i class="fas fa-trash colorIcono" aria-hidden="true"></i></a></td>
                                            @endif
                                        </tr>
                                        @endforeach

                                    </tfoot>
                                    </table>
                                    <div class="paginacion">{{ $clientes->links() }}</div>
                                    </div>
              <!-- /.card-body -->

              <div class="row filaAgregar">
                <div><a href="{{route('crearClientes')}}"><i class="fa fa-plus-circle agregar" aria-hidden="true"></i></a></div>
              </div>

            </div>
            <!-- /.card -->

