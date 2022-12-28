@extends('layouts.plantilla')

@section('titulo', 'Perfil usuario - Controlsys S.L')
@section('nombreUsuario', $user->name)

@section('contenido')


 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('imagenes-perfiles/'. $user->avatar)}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>

                <p class="text-muted text-center">{{$user->rol->nombre}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                  <i class="fas fa-envelope" aria-hidden="true"></i> &nbsp;{{$user->email}}
                  </li>
                  
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#informacion" data-toggle="tab">Editar información</a></li>
                  <li class="nav-item"><a class="nav-link" href="#avatar" data-toggle="tab">Cambiar Avatar</a></li>
                  <li class="nav-item"><a class="nav-link" href="#reseteo" data-toggle="tab">Resetear contraseña</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="informacion">
                    <form method="POST" action="{{route('actualizarInformacion')}}">
                     @csrf

                     <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="nombre" value="{{$user->name}}" required>
                  
                    </div>

                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}" required>
                        <input type="text" class="form-control-file" value="{{$user->id}}"  name="idOculto" hidden>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 ">ACTUALIZAR</button>

                    </form>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="avatar">

                  <form method="POST" action="{{route('cambiarImagenPerfil')}}" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <input type="file" class="form-control-file"  name="imgPerfilSeleccionada">
                      <input type="text" class="form-control-file" value="{{$user->id}}"  name="idOculto" hidden>
                      <button type="submit" name="cambiar" class="btn btn-primary mt-3">ACTUALIZAR</button>
                      <button type="submit" name="imgDefecto" class="btn btn-default mt-3">Imagen por defecto</button>
                    </div>
                  </form>
                    
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="reseteo">
                  <form method="POST" action="{{route('resetearContrasenna')}}">
                  @csrf
                  <div class="form-group">
                    <input type="password" class="form-control" name="contrasenna" placeholder="Nueva contraseña" required>
                    <input type="password" class="form-control mt-3" name="confirmarContrasenna" placeholder="Confirmar contraseña" required>
                    <input type="text" class="form-control-file" value="{{$user->id}}"  name="idOculto" hidden>
                    <button type="submit" class="btn btn-danger mt-3">RESETEAR</button>
                  </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
  
</div>
</div>
</div>
</section>

        
@endsection