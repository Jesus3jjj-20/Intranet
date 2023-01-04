@extends('layouts.plantilla')

@section('titulo', 'Crear servicio - Controlsys S.L')
@section('nombreUsuario', $user->name)

@section('contenido')


 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">

      <div class="card">
              <div class="card-header colorTablaHeader">
                <h3 class="card-title">Crear servicio</h3>
              </div>
              <div class="card-body">
                <form method="POST" action="{{route('insertarDatosServicioNuevo')}}">
                @csrf
                <div class="row">
                    <div class="col">
                    <div class="form-group">
                    <label>* Nombre:</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-info" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Nombre del servicio..." name="nombreServicio" required>
                    </div>
                    <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    </div>
                </div>
                <!--row-->

                    <div class="row mt-3">

                    <div class="col-sm-12 col-md-4">

                    <div class="form-group">
                    <label>* Plan:</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-bars" aria-hidden="true"></i></span>
                        </div>
                        <select class="form-select" aria-label="Select plan"  name="plan">
                            <option selected>Seleccione un plan</option>
                            @foreach($planes as $plan)
                            <option value="{{$plan->id}}">{{$plan->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    </div>

                    <div class="col-sm-12 col-md-4">

                    <div class="form-group">
                    <label>* Tipo:</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-bars" aria-hidden="true"></i></span>
                        </div>
                        <select class="form-select" aria-label="Select tipo" name="tipo">
                            <option selected>Seleccione un tipo</option>
                            @foreach($tipos as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    </div>

                    <div class="col-sm-12 col-md-4">

                    <div class="form-group">
                            <label>* Proveedor:</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-bars" aria-hidden="true"></i></span>
                                </div>
                                <select class="form-select" aria-label="Select proveedor"  name="proveedor">
                                    <option selected>Seleccione un proveedor</option>
                                    @foreach($proveedores as $proveedor)
                                        <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.input group -->
                            </div>
                            <!-- /.form group -->


                    </div>

                    </div>
                    <!--row-->

                    <div class="row mt-3">
                        <div class="col-sm-12 col-md-4">

                        <div class="form-group">
                        <label>Distribuidor:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-bars" aria-hidden="true"></i></span>
                            </div>
                            <select class="form-select" aria-label="Select distribuidor"  name="distribuidor">
                                <option selected>Seleccione un distribuidor</option>
                                @foreach($distribuidores as $distribuidor)
                                    <option value="{{$distribuidor->id}}">{{$distribuidor->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        </div>

                        <div class="col-sm-12 col-md-4">
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" id="facturaDistribuidor" name="facturaDistribuidor">
                                <label class="form-check-label" for="facturaDistribuidor">
                                    Factura distribuidor
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                        <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox" id="comisionDistribuidor" name="comisionDistribuidor">
                                <label class="form-check-label" for="comisionDistribuidor">
                                    Comisión distribuidor
                                </label>
                            </div>
                        </div>
                      
                    </div>
                    <!--row-->

                    <div class="row mt-3">
                        <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>* Cliente:</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-bars" aria-hidden="true"></i></span>
                                </div>
                                <select class="form-select" aria-label="Select cliente"  name="cliente">
                                    <option selected>Seleccione un cliente</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>

                        <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>* Fecha alta:</label>
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                    </div>
                                        <input  type="date" class="form-control"  id="fechaAlta" name="fechaAlta">
                                    </div>
                            </div>
                        </div>

                        </div>
                        <!--row-->


                        <div class="row mt-3">

                        <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>* Fecha expiración:</label>
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                    </div>
                                        <input  type="date" class="form-control"  id="fechaExpiracion" name="fechaExpiracion">
                                    </div>
                            </div>
                        </div>

                            <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                            <label>Fecha baja:</label>
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                    </div>
                                        <input  type="date" class="form-control"  id="fechaBaja" name="fechaBaja">
                                    </div>
                            </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                            <div class="form-group">
                                <label>Notas:</label>
                                <textarea class="form-control" placeholder="Escribe aquí..." name="notas" rows="3"></textarea>
                            </div>
                            </div>
                        </div>
                        <!--row-->

                        <div class="row mt-3">
                            <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                            <label>* Estado:</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-bars" aria-hidden="true"></i></span>
                                </div>
                                <select class="form-select" aria-label="Select estado" name="estado">
                                    <option selected>Seleccione un estado</option>
                                    @foreach($estados as $estado)
                                        <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                            </div>

                            <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label>* Mail administrativo</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" placeholder="Correo electrónico" name="emailAdministrativo" aria-describedby="emailHelp">
                            </div>
                             <!-- /.input group -->
                             </div>
                            <!-- /.form group -->

                            </div>

                        </div>
                        <!--row-->


                        <div class="row mt-3">
                            <div class="col">
                            <div class="form-group">
                                <label>Observaciones:</label>
                                <textarea class="form-control" placeholder="Escribe aquí..." name="observaciones" rows="3"></textarea>
                            </div>
                            </div>
                        </div>
                        <!--row-->

                        <div class="row">

                                <div class="col-sm-12 col-md-4">
                            <div class="form-group mt-2">
                                <label>* Periodificación cliente</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-bars" aria-hidden="true"></i></span>
                                    </div>
                                    <select class="form-select" aria-label="Select periodificacion cliente" name="periodificacionCliente">
                                        <option selected>Seleccione periodificación</option>
                                        <option value="mensual">Mensual</option>
                                        <option value="semestral">Semestral</option>
                                        <option value="trimestral">Trimestral</option>
                                        <option value="anual">Anual</option>
                                    </select>
                            </div>
                             <!-- /.input group -->
                             </div>
                            <!-- /.form group -->


                            </div>

                            <div class="col-sm-12 col-md-4">
                            <div class="form-group mt-2">
                                <label>* Periodificación proveedor</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-bars" aria-hidden="true"></i></span>
                                    </div>
                                    <select class="form-select" aria-label="Select periodificacion proveedor" name="periodificacionProveedor">
                                    <option selected>Seleccione periodificación</option>
                                        <option value="mensual">Mensual</option>
                                        <option value="semestral">Semestral</option>
                                        <option value="trimestral">Trimestral</option>
                                        <option value="anual">Anual</option>
                                    </select>
                            </div>
                             <!-- /.input group -->
                             </div>
                            <!-- /.form group -->


                            </div>

                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label>Precio</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">€</span>
                                        </div>
                                <input type="text" class="form-control" placeholder="Precio" name="precio">
                                </div>
                                <!-- /.input group -->
                                </div>
                                <!-- /.form group -->

                                </div>


                        </div>
                        <!--row-->


                    <button type="submit" class="btn btn-primary botonLogin mt-2">Crear</button>

                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


      </div>
</div>
 </section>

@endsection