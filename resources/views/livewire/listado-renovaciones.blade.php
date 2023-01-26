<div>


<div class="card-header">

<div class="row">
  <div class="col-md-9">
    <h3 class="card-title mt-2">Listado renovaciones</h3>
  </div>
  <div class="col-md-3 columnaFiltroMes">
  <select class="form-select" aria-label="Default select example" wire:model="mes">
    <option value = "" selected>Filtrar por mes</option>
    <option value="1">Enero</option>
    <option value="2">Febrero</option>
    <option value="3">Marzo</option>
    <option value="4">Abril</option>
    <option value="5">Mayo</option>
    <option value="6">Junio</option>
    <option value="7">Julio</option>
    <option value="8">Agosto</option>
    <option value="9">Septiembre</option>
    <option value="10">Octubre</option>
    <option value="11">Noviembre</option>
    <option value="12">Diciembre</option>
</select>
</div>

</div>
<!-- /.card-header -->




<div class="card-body">

    <table id="listadoRenovaciones" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Servicio</th>
                        <th>Tipo</th>
                        <th>Distribuidor</th>
                        <th>Proveedor</th>
                        <th>Fecha expiración</th>
                        <th>Nº Presupuesto</th>
                        <th>Estado</th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>

        
                    @foreach($renovaciones as $renovacion)

                    <tr>
                        <td>{{$renovacion->servicio->servicio}}</td>
                        <td>{{$renovacion->servicio->tipo->nombre}}</td>
                        <td>{{isset($renovacion->servicio->distribuidor->nombre) ? $renovacion->servicio->distribuidor->nombre : '' }}</td>
                        <td>{{isset($renovacion->servicio->proveedor->nombre) ? $renovacion->servicio->proveedor->nombre : '' }}</td>
                        <td>{{\Carbon\Carbon::parse(strtotime($renovacion->fecha_renovacion))->formatLocalized('%d/%m/%Y')}}</td>
                            <td>{{$renovacion->nPresupuesto}}</td>
                            @if($renovacion->estadoRenovacion->estado == "Pendiente")
                            <td class="pendiente">{{$renovacion->estadoRenovacion->estado}}</td>
                            @elseif($renovacion->estadoRenovacion->estado == "Enviado")
                            <td class="enviado">{{$renovacion->estadoRenovacion->estado}}</td>
                            @elseif($renovacion->estadoRenovacion->estado == "Enviado2")
                            <td class="enviado2">{{$renovacion->estadoRenovacion->estado}}</td>
                            @else
                            <td class="aceptado">{{$renovacion->estadoRenovacion->estado}}</td>
                            @endif
                            
                            
                            @if($user->rol->admin != 1)
                                <td><a href="{{route('editarRenovacion',['idRenovacion'=>$renovacion->id])}}"><i class="fas fa-edit colorIcono"></i></a></td>
                            @endif
                    </tr>
                      
                    @endforeach

                    </tbody>
    </table>
    <div class="paginacion">{{ $renovaciones->links() }}</div>
</div>
<!-- /.card-body -->

<div class="row filaAgregar">
<div class="botonRenovaciones" wire:click="importarRenovaciones()">IMPORTAR RENOVACIONES</div>
</div>

</div>
<!-- /.card -->

</div>
