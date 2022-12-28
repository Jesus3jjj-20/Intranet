@extends('layouts.plantilla')

@section('titulo', 'Administración usuarios - Controlsys S.L')
@section('nombreUsuario', $user->name)

@section('contenido')

<section class="content tarjetas contenedorTarjetasAdmin">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row tarjetas">
        <div class="col-sm-12 col-lg-3">
            <!-- small box -->
            <a href="{{route('creacionUsuarios')}}"><div class="small-box tarjetaAdmin bg-success">
              <div class="inner">
                <h3>Crear</h3>
                <h3>Usuario</h3>
              </div>
              <div class="icon">
              <i class="fas fa-solid fa-user-plus"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div></a>
          </div>
          <!-- ./col -->



          
          <div class="col-sm-12 col-lg-3">
            <!-- small box -->
            <a href="{{route('editarUsuarios')}}"><div class="small-box tarjetaAdmin bg-warning">
              <div class="inner">
                <h3>Editar</h3>
                <h3>Usuario</h3>
              </div>
              <div class="icon">
              <i class="fas fa-user-edit"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div></a>
          </div>
          <!-- ./col -->
          <div class="col-sm-12 col-lg-3">
            <!-- small box -->
            <a href="{{route('eliminarUsuariosListado')}}"><div class="small-box tarjetaAdmin bg-danger">
              <div class="inner">
                <h3>Eliminar</h3>
                <h3>Usuario</h3>
              </div>
              <div class="icon">
              <i class="fas fa-solid fa-user-minus"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div></a>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
</div>
</div>
        
@endsection