@extends('layouts.plantilla')

@section('titulo', 'Listado servicios - Controlsys S.L')
@section('nombreUsuario', $user->name)

@section('contenido')


 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">

<div class="card">
    <div class="row">
        <a href="{{route('pdfServicios')}}"><button class="botonPDF"><i class="fas fa-file-pdf"></i> &nbsp; PDF</button></a>
        <a href="#"><button class="botonExcel"><i class="fas fa-file-pdf"></i> &nbsp; EXCEL</button></a>
    </div>
              
    <livewire:listado-servicios />

    </div>
  </div>
 </div>
</section>

        
@endsection