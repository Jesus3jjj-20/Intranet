@extends('layouts.plantilla')

@section('titulo', 'Administración - Controlsys S.L')
@section('nombreUsuario', $user->name)

@section('contenido')


    <!-- Main content -->
    <section class="content tarjetas contenedorTarjetasAdmin">
      <div class="container-fluid">
        <div class="row tarjetas">
          
          <div class="col-md-6">
            <a href="{{route('administracionUsuarios')}}"><div class="card tarjeta">
              <div class="card-body">
                <h4>ADMINISTRAR USUARIOS</h4>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div></a>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row tarjetas">
          
          <div class="col-md-6">
            <a href="{{route('creacionRoles')}}"><div class="card tarjeta">
              <div class="card-body">
                <h4>CREACIÓN DE ROLES</h4>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div></a>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
</div>
</div>
</section>

        
@endsection