<div>
<div class="card-header">
                <div class="row">
                  <div class="col-9">
                  <h3 class="card-title mt-2">Información proveedores</h3>
                  </div>
                  <div class="col-3">
                  <input type="text" class="form-control" name="buscar"  wire:model="buscador" placeholder="Buscar..." required>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="listadoClientes" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th># &nbsp;<i class="{{$icono}} iconoOrdenar" wire:click="ordenarPorCampo('id')"></i></th>
                    <th>Nombre  &nbsp;  <i class="{{$icono}} iconoOrdenar" wire:click="ordenarPorCampo('nombre')"></i></th>

                    @if($user->rol->admin != 1)
                    <th>Editar</th>
                    <th>Eliminar</th>
                    @endif

                  </tr>
                  </thead>
                  <tbody>
            @foreach($proveedores as $proveedor)
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
                <div class="paginacion">{{ $proveedores->links() }}</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

</div>
