@extends('layouts.plantilla')

@section('titulo', 'Creación de roles - Controlsys S.L')
@section('nombreUsuario', $user->name)

@section('contenido')


 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">

      <div class="card">
              <div class="card-header colorTablaHeader">
                <h3 class="card-title">Crear rol</h3>
              </div>
              <div class="card-body">
                <form method="POST" action="{{route('guardarNuevoRol')}}">
                @csrf
                    <div class="form-group">
                    <label>Nombre:</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-address-book"></i></span>
                        </div>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <!-- /.input group -->
                    </div>
                    <!-- /.form group -->



                    <div class="form-group">
                    <label>Permisos:</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-wrench"></i></span>
                        </div>
                        <select class="form-control" name="rol">
                            <option value="3">Control total</option>
                            <option value="2" selected="selected">Lectura y escritura</option>
                            <option value="1">Lectura</option>
                        </select>
                    </div>
                    <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <button type="submit" class="btn btn-primary botonLogin">Crear</button>

                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Listado de roles</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="listadoClientes" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Permisos</th>
                    <th></th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($roles as $rol)
                    <tr>
                      <form method="POST" action="{{route('modificacionesRoles')}}">
                      @csrf
                        <td>{{$rol->id}}</td>
                        <td> 
                            <input type="text" class="form-control" name="nombre" value="{{$rol->nombre}}" required>
                            <input type="text" class="form-control" name="idOculto" value="{{$rol->id}}" required hidden>
                        </td>
                        <td>
                        <select class="form-control" name="rol">
                            <option value="3" {{$rol->admin == 3 ? "selected" : ""}}>Control total</option>
                            <option value="2" {{$rol->admin == 2 ? "selected" : ""}}>Lectura y escritura</option>
                            <option value="1" {{$rol->admin == 1 ? "selected" : ""}}>Lectura</option>
                        </select>
                        </td>
                        <td><button type="submit" name="actualizar" class="btn btn-primary botonLogin">Actualizar</button></td>
                        <td><button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button></td>
                      </form>
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