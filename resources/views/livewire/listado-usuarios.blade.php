<div>
<div class="card-header">
                <div class="row">
                  <div class="col-9">
                  <h3 class="card-title mt-2">Listado usuarios</h3>
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
                    <th>Nombre &nbsp;<i class="{{$icono}} iconoOrdenar" wire:click="ordenarPorCampo('name')"></i></th>
                    <th>Email &nbsp;<i class="{{$icono}} iconoOrdenar" wire:click="ordenarPorCampo('email')"></i></th>
                    <th>Avatar</th>
                    <th>Editar</th>
                  </tr>
                  </thead>
                  <tbody>
            @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td><img src="{{asset('imagenes-perfiles/'. $usuario->avatar)}}" class="img-circle elevation-2 avatarEditarUsuarios" alt="User Image"></td>
                        <td><a href="{{route('editarDatosUsuarios',['idUsuario'=>$usuario->id])}}"><i class="fas fa-edit colorIcono"></i></a></td>
                    </tr>
           @endforeach
                  </tfoot>
                </table>
                <div class="paginacion">{{ $usuarios->links() }}</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
</div>
