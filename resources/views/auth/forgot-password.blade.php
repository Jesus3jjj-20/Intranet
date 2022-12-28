<x-guest-layout>

  <div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
               <!-- <x-slot name="logo">
        </x-slot>-->
    <a href="https://www.controlsys.es/" target="_blank"><img src="{{asset('images/logoControlsysHorizontal.png')}}" alt="Logo Controlsys S.L"></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">¿Ha olvidado su contraseña? No se preocupe, indique su dirección de correo electrónico y le enviaremos un correo de restauración</p>
     
      <form method="POST" action="{{ route('password.email') }}">
            @csrf
        <div class="input-group mb-3">
          <input id="email" name="email" type="email" class="form-control" type="email" placeholder="Email" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block botonLogin">Enviar correo</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="{{route('login')}}">Login</a>
      </p>

      @if (count($errors) > 0)
        <div class="alert alert-danger mt-3">
            <p>Corrige los siguientes errores:</p>
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


</x-guest-layout>
