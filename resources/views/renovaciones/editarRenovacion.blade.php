@extends('layouts.plantilla')

@section('titulo', 'Editar renovación - Controlsys S.L')
@section('nombreUsuario', $user->name)

@section('contenido')


 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">

      <div class="card">
              <div class="card-header colorTablaHeader">
                <h3 class="card-title">Editar renovación</h3>
              </div>
              <div class="card-body">
                <form method="POST" action="{{route('actualizarRenovacion')}}">
                @csrf

                <div class="row">
                   
                        <div class="form-group">
                        <label>Nº presupuesto:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-address-book"></i></span>
                            </div>
                            <input type="text" class="form-control" name="numeroPresupuesto" value="{{$renovacion->nPresupuesto}}">
                            <input type="text" class="form-control" name="idOculto" value="{{$renovacion->id}}" hidden>
                        </div>
                        <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                </div>

                <div class="row">
          
                    <div class="form-group">
                    <label>Estado:</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-address-book"></i></span>
                        </div>
                       
                       
                        <select class="form-select" name="estado" aria-label="Elección estados">
                            @foreach($estados as $estado)
                                <option value="{{$estado->id}}" {{($renovacion->estado_renovacion_id == $estado->id) ? 'selected' : ''}}>{{$estado->estado}}</option>
                            @endforeach
                        </select>
                        

                    </div>
                    <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                
                </div>


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