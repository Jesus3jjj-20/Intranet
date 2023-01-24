@extends('layouts.plantilla')

@section('titulo', 'Listado renovaciones - Controlsys S.L')
@section('nombreUsuario', $user->name)

@section('contenido')


 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">

    <div class="card">
    
        <livewire:listado-renovaciones />
    
    </div>
  </div>

  </div>
</section>

        
@endsection