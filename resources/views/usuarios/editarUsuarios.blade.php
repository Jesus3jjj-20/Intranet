@extends('layouts.plantilla')

@section('titulo', 'Editar usuarios - Controlsys S.L')
@section('nombreUsuario', $user->name)

@section('contenido')


 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">

  <div class="card">
           
      <livewire:listado-usuarios />

    </div>
  </div>
</section>

        
@endsection