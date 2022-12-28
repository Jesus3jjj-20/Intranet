@extends('layouts.plantilla')

@section('titulo', 'Editar proveedor - Controlsys S.L')
@section('nombreUsuario', $user->name)

@section('contenido')


 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">

      <div class="card">
              <div class="card-header colorTablaHeader">
                <h3 class="card-title">Editar proveedor</h3>
              </div>
              <div class="card-body">
                <form method="POST" action="{{route('editarDatosProveedores')}}">
                @csrf
                    <div class="form-group">
                    <label>Nombre:</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-address-book"></i></span>
                        </div>
                        <input type="text" class="form-control" name="nombre" value="{{$proveedor->nombre}}" required>
                        <input type="text" class="form-control" name="idOculto" value="{{$proveedor->id}}" hidden>
                    </div>
                    <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <button type="submit" class="btn btn-primary botonLogin">ACTUALIZAR</button>

                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


      </div>
    </div>
 </section>

@endsection