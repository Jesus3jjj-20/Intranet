@extends('layouts.plantilla')

@section('titulo', 'Listado distribuidores - Controlsys S.L')
@section('nombreUsuario', $user->name)

@section('contenido')


 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">

<div class="card">
          <div class="row">
              <a href="{{route('pdfDistribuidores')}}"><button class="botonPDF"><i class="fas fa-file-pdf"></i> &nbsp; PDF</button></a>
              <a href="{{route('excelDistribuidores')}}"><button class="botonExcel"><i class="fas fa-file-pdf"></i> &nbsp; EXCEL</button></a>
          </div>
          <livewire:listado-distribuidores />

    </div>
  </div>
</section>

        
@endsection