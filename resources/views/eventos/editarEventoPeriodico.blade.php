@extends('layouts.plantilla')

@section('titulo', 'Editar Evento Periódico')
@section('nombreUsuario', $user->name)

@section('contenido')

            <!-- Main content -->
            <section class="content">
            <div class="container-fluid">

            <div class="row">

            <div class="col">
                <div class="card">
                        <div class="card-header cabeceraCrearEvento">
                        <div class="row">
                            <h3 class="card-title mt-2">Editar evento periódico</h3>
                        </div>

                        </div>
                        <div class="card-body">
                        <div class="container">

                        <form method="POST" action="{{route('actualizarEventoPeriodico')}}">
                        @csrf
                        <div class="row">
                          <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nombre del evento</span>
                            </div>
                                <input  type="text" value="{{$evento->nombre}}" class="form-control" id="nombreEvento" name="nombreEvento">
                            </div>
                        </div>

                        <div class="row">
                          <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Descripción</span>
                            </div>
                            <textarea class="form-control" id="descripcionEvento" name="descripcionEvento" rows="3">{{$evento->descripcion}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-2">

                            <div class="col-sm-12 col-md-3">
                                <p class="etiquetaCrearEvento">Color</p>
                                <div class="input-group">
                                <select class="form-select form-select-lg mt-3" aria-label=".form-select-lg example" id="colorEvento" name="colorEvento">
                                    <option class="optionAzul" value="#007bff" {{($evento->color == "#007bff") ? 'selected' : ''}} >Azul</option>
                                    <option class="optionAmarillo" value="#ffc107"  {{($evento->color == "#ffc107") ? 'selected' : ''}}>Amarillo</option>
                                    <option class="optionVerde" value="#28a745" {{($evento->color == "#28a745") ? 'selected' : ''}}>Verde</option>
                                    <option class="optionRojo" value="#dc3545" {{($evento->color == "#dc3545") ? 'selected' : ''}}>Rojo</option>
                                    <option class="optionGris" value="#6c757d" {{($evento->color == "#6c757d") ? 'selected' : ''}}>Gris</option>
                                </select>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-9">
                              <p class="etiquetaCrearEvento">Día / Mes</p>
                              <div class="input-group mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                </div>
                                <input type="number" value="{{$evento->dia}}" id="dia" name="dia" class="form-control mr-1" min="01" max="31" />
                        
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                </div>
                                <input type="number" value="{{$evento->mes}}"  id="mes" name="mes" class="form-control mr-1" min="01" max="12" />
                                <input type="number" value="{{$evento->id}}"  id="idOculto" name="idOculto" class="form-control" hidden/>
                            </div>
                            </div>
 
                        </div>


                        <button type="submit" class="btn btn-primary botonEstiloControlsys mt-4">Editar</button>

                        </form>
                        </div>
                        
                    </div>
                </div>
            </div>

            </div>
            <!-- /.row -->

          
        </div><!-- /.container-fluid -->
  </div>
</section>
    <!-- /.content -->

    
@endsection