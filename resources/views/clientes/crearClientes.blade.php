@extends('layouts.plantilla')

@section('titulo', 'Dar de alta cliente - Controlsys S.L')
@section('nombreUsuario', $user->name)

@section('contenido')


 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">

      <div class="card">
              <div class="card-header colorTablaHeader">
                <h3 class="card-title">Dar de alta cliente</h3>
              </div>
              <div class="card-body">
                <form method="POST" action="{{route('guardarDatosClienteNuevo')}}">
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
                    <label>Email:</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" name="email" required>
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


      </div>
</div>
 </section>

@endsection