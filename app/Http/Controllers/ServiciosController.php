<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Plan;
use App\Models\Tipo;
use App\Models\Proveedore;
use App\Models\Distribuidore;
use App\Models\Cliente;
use App\Models\Estado;
use App\Models\Evento;
use Illuminate\Support\Facades\Auth;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ServicioExportacion;
use Carbon\Carbon;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('servicios.listadoServicios',['user'=> $user]);
    }

    public function pantalla(){

        $dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
        $meses = array('enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
        $diaSemana = $dias[date('N', strtotime(\Carbon\Carbon::now()))];
        $diaNumero = \Carbon\Carbon::now()->format('d');
        $mes = $meses[\Carbon\Carbon::now()->format('n') - 1];
        $annio = \Carbon\Carbon::now()->format('Y');
        $hoy = \Carbon\Carbon::now()->format('Y-m-d');

        $serviciosDominiosHostingsSSL = Servicio::where('tipo_id',1)->orWhere('tipo_id',2)->where('fecha_expiracion', '>=', $hoy)->orderBy('fecha_expiracion','asc')->take(11)->get();
        $serviciosMicrosft = Servicio::where('tipo_id',3)->where('fecha_expiracion', '>=', $hoy)->orderBy('fecha_expiracion','asc')->take(11)->get();

        $otrosServicios = Servicio::where('tipo_id', "!=" ,1)->where('tipo_id', "!=" , 2)->where('tipo_id', "!=" ,3)->where('fecha_expiracion', '>=', $hoy)->orderBy('fecha_expiracion','asc')->take(11)->get();

        $recordatorios = Evento::where('fecha_inicio', '<=', $hoy)
                        ->where('fecha_fin', '>=', $hoy)
                        ->get();


        Carbon::setLocale('es');

        return view('servicios.pantalla',['recordatorios'=>$recordatorios, 'otrosServicios'=> $otrosServicios, 'serviciosMicrosoft'=>$serviciosMicrosft, 'serviciosDominiosHostingsSSL' => $serviciosDominiosHostingsSSL, 'diaSemana'=> $diaSemana, 'diaNumero'=>$diaNumero, 'mes'=>$mes, 'annio'=> $annio]);
    }

    public function crearServicio(){


        
     /*   $serviciosAleatorio = Servicio::factory()->count(100)->make();
        foreach($serviciosAleatorio as $servicio){
            $servicio->save();
        }*/

        $user = Auth::user();
        $planes = Plan::all();
        $tipos = Tipo::all();
        $proveedores = Proveedore::all();
        $distribuidores = Distribuidore::all();
        $clientes = Cliente::all();
        $estados = Estado::all();

        return view('servicios.crearServicio',['user'=> $user,'estados'=>$estados, 'planes'=>$planes,'tipos'=>$tipos, 'proveedores'=>$proveedores, 'distribuidores'=>$distribuidores, 'clientes'=>$clientes]);
    }


    public function insertarDatos(Request $request){
        $servicio = new Servicio;

        $facturaDistribuidor = ($request->facturaDistribuidor == "on") ? true : false;
        $comisionDistribuidor = ($request->comisionDistribuidor == "on") ? true : false;
        
        $servicio->servicio = $request->nombreServicio;
        $servicio->plan_id = $request->plan;
        $servicio->tipo_id = $request->tipo;
        $servicio->distribuidore_id = $request->distribuidor;
        $servicio->factura_distribuidor =  $facturaDistribuidor;
        $servicio->comision_distribuidor = $comisionDistribuidor;
        $servicio->proveedore_id = $request->proveedor;
        $servicio->cliente_id = $request->cliente;
        $servicio->fecha_alta = $request->fechaAlta;
        $servicio->fecha_expiracion = $request->fechaExpiracion;
        $servicio->fecha_baja = $request->fechaBaja;
        $servicio->notas = $request->notas;
        $servicio->estado_id = $request->estado;
        $servicio->mail_administrativo = $request->emailAdministrativo;
        $servicio->observaciones = $request->observaciones;
        $servicio->precio = $request->precio;
        $servicio->periodificacion_cliente = $request->periodificacionCliente;
        $servicio->periodificacion_proveedor = $request->periodificacionProveedor;

        $servicio->save();

        return redirect()->route('listadoServicios');
    }


    public function editarServicios($idServicio){

        $servicio = Servicio::find($idServicio);
        $user = Auth::user();
        $planes = Plan::all();
        $tipos = Tipo::all();
        $proveedores = Proveedore::all();
        $distribuidores = Distribuidore::all();
        $clientes = Cliente::all();
        $estados = Estado::all();

        return view('servicios.editarServicios',['user'=>$user,'servicio'=>$servicio,'estados'=>$estados, 'planes'=>$planes,'tipos'=>$tipos, 'proveedores'=>$proveedores, 'distribuidores'=>$distribuidores, 'clientes'=>$clientes]);

    }

    public function actualizarServicios(Request $request){

        $facturaDistribuidor = ($request->facturaDistribuidor == "on") ? true : false;
        $comisionDistribuidor = ($request->comisionDistribuidor == "on") ? true : false;

        Servicio::where('id', $request->idOculto)
        ->update(['servicio' => $request->nombreServicio,
                  'plan_id' => $request->plan,
                  'tipo_id' => $request->tipo,
                  'distribuidore_id' => $request->distribuidor,
                  'factura_distribuidor' => $facturaDistribuidor,
                  'comision_distribuidor' => $comisionDistribuidor,
                  'proveedore_id' => $request->proveedor,
                  'cliente_id' => $request->cliente,
                  'fecha_alta' => $request->fechaAlta,
                  'fecha_expiracion' => $request->fechaExpiracion,
                  'fecha_baja' => $request->fechaBaja,
                  'notas' => $request->notas,
                  'estado_id' => $request->estado,
                  'mail_administrativo' => $request->emailAdministrativo,
                  'observaciones' => $request->observaciones,
                  'precio' => $request->precio,
                  'periodificacion_cliente' => $request->periodificacionCliente,
                  'periodificacion_proveedor' => $request->periodificacionProveedor,
                ]);

        return redirect()->back();
    }


    public function eliminarServicios($idServicio){
        Servicio::where("id",$idServicio)->delete();
        return redirect()->back();
    }


    public function exportarPDF(){ 

        $servicios = session('listadoServicios');
        $pdf = \PDF::loadView('servicios.listadoServiciosPDF', compact('servicios')); 
        return $pdf->download('servicios.pdf');

    }

    public function exportarExcel(){
        $servicios = session('listadoServicios');
        return Excel::download(new ServicioExportacion($servicios), 'servicios.xlsx');
    }


    public function cambiarEstadoServicio($idServicio){
        $estadoServicio = Servicio::select('realizado')->where('id',$idServicio)->get();
        
        if($estadoServicio){
            Servicio::where('id', $idServicio)
            ->update(['realizado' => false]);
        }else{
            Servicio::where('id', $idServicio)
            ->update(['realizado' => true]);
        }

        return redirect()->route('listadoServicios');

    }

}
