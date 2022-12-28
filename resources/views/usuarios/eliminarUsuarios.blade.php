@extends('layouts.plantilla')

@section('titulo', 'Eliminar usuarios - Controlsys S.L')
@section('nombreUsuario', $user->name)

@section('contenido')


 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">

<div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-9">
                  <h3 class="card-title mt-2">Listado usuarios</h3>
                  </div>
                  <div class="col-3">
                    <input type="text" class="form-control" name="buscar" placeholder="Buscar..." required>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="listadoClientes" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Avatar</th>
                    <th>Eliminar</th>
                  </tr>
                  </thead>
                  <tbody>
            @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td><img src="{{asset('imagenes-perfiles/'. $usuario->avatar)}}" class="img-circle elevation-2 avatarEditarUsuarios" alt="User Image"></td>
                        <td><a href="{{route('eliminarUsuario',['idUsuario'=>$usuario->id])}}"><i class="fas fa-trash colorIcono"></i></a></td>
                    </tr>
           @endforeach
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

    </div>
  </div>
</section>

        
@endsection