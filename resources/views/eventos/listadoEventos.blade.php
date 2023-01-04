@extends('layouts.plantilla')

@section('titulo', 'Listado eventos - Controlsys S.L')
@section('nombreUsuario', $user->name)

@section('contenido')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

      <livewire:listado-eventos />

</div><!-- /.container-fluid -->
     </div>
    </section>
    <!-- /.content -->

    
@endsection