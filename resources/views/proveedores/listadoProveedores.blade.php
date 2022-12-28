@extends('layouts.plantilla')

@section('titulo', 'Listado proveedores - Controlsys S.L')
@section('nombreUsuario', $user->name)

@section('contenido')


 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">

<div class="card">

          <div class="row">
              <a href="{{route('pdfProveedores')}}"><button class="botonPDF"><i class="fas fa-file-pdf"></i> &nbsp; PDF</button></a>
              <a href="{{route('excelProveedores')}}"><button class="botonExcel"><i class="fas fa-file-pdf"></i> &nbsp; EXCEL</button></a>
          </div>

          <livewire:listado-proveedores />
    </div>
  </div>
</section>

        
@endsection