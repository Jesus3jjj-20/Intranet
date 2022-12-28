<x-guest-layout>

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <!--<x-slot name="logo">
        </x-slot>-->
     <!-- <a href="../../index2.html" class="h1"><b>Controlsys </b>S.L</a>-->
     <a href="https://www.controlsys.es/" target="_blank"><img src="{{asset('images/logoControlsysHorizontal.png')}}" alt="Logo Controlsys S.L"></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Inicie sesión para acceder al panel</p>

      <form method="POST" action="{{ route('login') }}">
            @csrf
        <div class="input-group mb-3">
        <input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input id="password" class="form-control"
                                type="password"
                                name="password"
                                placeholder="Contraseña"
                                required autocomplete="current-password" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">
                Recuérdame
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block botonLogin">Entrar </button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
      @if (Route::has('password.request'))
      <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">¿Has olvidado la contraseña?</a>
      @endif
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
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

</x-guest-layout>
