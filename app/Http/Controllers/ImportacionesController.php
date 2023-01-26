<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bdproveedor;
use App\Models\Proveedor;
use App\Models\Bddistribuidor;
use App\Models\Distribuidor;
use App\Models\Bddominios;
use App\Models\Bdhostings;
use App\Models\Bdmantenimientos;
use App\Models\Bdmantenimientosdo;
use App\Models\Cliente;
use App\Models\Servicio;
use App\Models\Estado;
use App\Models\Plan;
use Illuminate\Support\Str;

class ImportacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    


    }

    public function importProveedores(){

        $datosImportar = Bdproveedor::all();

        foreach($datosImportar as $proveedor){
            
            $nuevoProveedor = new Proveedor;
            $nuevoProveedor->id = $proveedor->Id;
            $nuevoProveedor->nombre = $proveedor->NOM_PROV;
            $nuevoProveedor->nom_contac_prov = $proveedor->NOM_CONTAC_PROV;
            $nuevoProveedor->telf_prov = $proveedor->TELF_PROV ;
            $nuevoProveedor->fax_prov = $proveedor->FAX_PROV;
            $nuevoProveedor->form_pago_prov = $proveedor->FORM_PAGO_PROV;
            $nuevoProveedor->banco_prov = $proveedor->BANCO_PROV;
            $nuevoProveedor->cuenta_corrient_prov = $proveedor->CUENTA_CORRIENT_PROV;
            $nuevoProveedor->e_mail_prov = $proveedor->E_MAIL_PROV;
            $nuevoProveedor->e_mail_contac_prov = $proveedor->E_MAIL_CONTAC_PROV;
            $nuevoProveedor->login_servicio = $proveedor->LOGIN_SERVICIO;
            $nuevoProveedor->password_servicio = $proveedor->PASSWORD_SERVICIO;
            $nuevoProveedor->url_intranet = $proveedor->URL_INTRANET;

            $nuevoProveedor->save();

        }

        return redirect()->route('listadoProveedores'); 

    }



    public function importDistribuidores(){

        $datosImportar = Bddistribuidor::all();

        foreach($datosImportar as $distribuidor){
            
            $nuevoDistribuidor = new Distribuidor;
            $nuevoDistribuidor->id = $distribuidor->ID_DIST;
            $nuevoDistribuidor->nombre = $distribuidor->NOMBRE_DIST;
            $nuevoDistribuidor->FACT_PROV = $distribuidor->FACT_PROV;
           

            $nuevoDistribuidor->save();

        }

        return redirect()->route('listadoDistribuidores'); 

    }


    public function importClientes(){

        $datosClientesDominio= Bddominios::select('NOMBRE_CLIENTE','MAIL_ADMINISTRATIVO')->where('ESTADO',"!=", "BAJA")->get();
        $datosImportarHostings = Bdhostings::select('CLIENTE','mail_contacto')->where('situacion',"!=", "DESACTIVO")->get();
        $datosImportarMantenimientos = Bdmantenimientos::select('CLIENTE','mail_contacto')->where('ACTIVO',"!=", "0")->get();

        foreach($datosClientesDominio as $cliente){

            if (Cliente::where('nombre', '=', $cliente->NOMBRE_CLIENTE)->exists() != true) {
                
                $nuevoCliente = new Cliente;

                if($cliente->NOMBRE_CLIENTE == NULL){
                 $nuevoCliente->nombre = "";
                }else{
                 $nuevoCliente->nombre = $cliente->NOMBRE_CLIENTE;
                }
     
     
                $nuevoCliente->email = $cliente->MAIL_ADMINISTRATIVO;
                
     
               $nuevoCliente->save();
            }
           
        }

        
        foreach($datosImportarHostings as $cliente){

            if (Cliente::where('email', '=', $cliente->mail_contacto)->exists() != true) {
            
            $nuevoCliente = new Cliente;
 
            if($cliente->CLIENTE == NULL){
             $nuevoCliente->nombre = "";
            }else{
             $nuevoCliente->nombre = $cliente->CLIENTE;
            }
 
 
            $nuevoCliente->email = $cliente->mail_contacto;
            
 
           $nuevoCliente->save();

           }
 
         }



         foreach($datosImportarMantenimientos as $cliente){

            if (Cliente::where('email', '=', $cliente->mail_contacto)->exists() != true) {
            
            $nuevoCliente = new Cliente;
 
            if($cliente->CLIENTE == NULL){
             $nuevoCliente->nombre = "";
            }else{
             $nuevoCliente->nombre = $cliente->CLIENTE;
            }
 
 
            $nuevoCliente->email = $cliente->mail_contacto;
            
 
           $nuevoCliente->save();

          }
 
         }


        return redirect()->route('listadoClientes'); 

    }




    public function importServiciosDominios(){

        $datosserviciosDominios = Bddominios::where('ESTADO',"!=", "BAJA")->where('ESTADO',"!=", "DUPLICADO")->get();


        foreach($datosserviciosDominios as $servicio){


            $consultaCliente = Cliente::where('nombre' , $servicio->NOMBRE_CLIENTE)->first();


            if($consultaCliente == null){
                $IdCliente = 1;
            }else{
                $IdCliente = $consultaCliente->id;
            }


            $nuevoServicio = new Servicio;
            $nuevoServicio->servicio = $servicio->NOMBRE_DOMINIO;
            $nuevoServicio->plan_id = null;
            $nuevoServicio->tipo_id = 1;
            $nuevoServicio->distribuidor_id = $servicio->DISTRIBUIDOR_GRUPO;
            $nuevoServicio->factura_distribuidor = $servicio->FACTURA_DISTRIBUIDOR;
            $nuevoServicio->comision_distribuidor = $servicio->COMISION_DISTRIBUIDOR;
            $nuevoServicio->proveedor_id = $servicio->Id;
            $nuevoServicio->cliente_id = $IdCliente;
            $nuevoServicio->fecha_alta = $servicio->FECHA_ALTA_ISP;
            $nuevoServicio->fecha_expiracion =  $servicio->FECHA_EXPIRACION_DOMINIO;
            $nuevoServicio->fecha_baja = null;
            $nuevoServicio->notas = $servicio->NOTAS;
            $nuevoServicio->estado_id = 1;
            $nuevoServicio->mail_administrativo = $servicio->MAIL_ADMINISTRATIVO;
            $nuevoServicio->observaciones = "";
            $nuevoServicio->observaciones_migracion = $servicio->COD;
            $nuevoServicio->precio = $servicio->PRECIO_VENTA;

            if($servicio->PRECIO_ESPECIAL != 0){
                $nuevoServicio->observaciones = "PRECIO ESPECIAL: " . $servicio->PRECIO_ESPECIAL; 
            }

            $nuevoServicio->periodificacion_proveedor = "anual";

            $nuevoServicio->save();
        }

        return redirect()->route('listadoServicios'); 

    }


    
    public function importServiciosHostings(){

        $datosserviciosHostings = Bdhostings::where('situacion',"!=", "DESACTIVO")->get();


        foreach($datosserviciosHostings as $servicio){

        $consultaCliente = Cliente::where('nombre' , $servicio->CLIENTE)->first();

        if($consultaCliente == null){
            $IdCliente = 1;
        }else{
            $IdCliente = $consultaCliente->id;
        }

        $consultaDistribuidor =  Distribuidor::where('nombre', $servicio->Distribuidor)->first();

        if($consultaDistribuidor == null){
            $IdDistribuidor = null;
        }else{
            $IdDistribuidor = $consultaDistribuidor->id;
        }


        $nuevoServicio = new Servicio;
        $nuevoServicio->servicio = Bddominios::where('COD',$servicio->COD)->first()->NOMBRE_DOMINIO;
        
        $plan = Plan::updateOrCreate(
            ['nombre' => $servicio->notas,'tipo_id' => 2 ]
        );


        $nuevoServicio->plan_id = $plan->id;
        $nuevoServicio->tipo_id = 2;
        $nuevoServicio->distribuidor_id = $IdDistribuidor;

        if($servicio->Distribuidor != null && $servicio->Factura_a_cliente == false){
            $nuevoServicio->factura_distribuidor = true;
        }else{
            $nuevoServicio->factura_distribuidor = false;
        }

        $nuevoServicio->comision_distribuidor = $servicio->Comision;
        //$nuevoServicio->proveedor_id = $servicio->Id;
        $nuevoServicio->cliente_id = $IdCliente;
        $nuevoServicio->fecha_alta = $servicio->fecha_alta;
        $nuevoServicio->fecha_expiracion = \Carbon\Carbon::createFromDate($servicio->fecha_alta)->format('2023-m-d H:i:s'); 
        $nuevoServicio->fecha_baja = $servicio->fecha_baja;
        $nuevoServicio->notas = $servicio->notas2; 
        $nuevoServicio->estado_id = 1;
        $nuevoServicio->mail_administrativo = $servicio->mail_contacto;
        $nuevoServicio->observaciones = "";
       // $nuevoServicio->observaciones_migracion = $servicio->COD;
        $nuevoServicio->precio = $servicio->Precio_especial;

        $nuevoServicio->observaciones = ""; 

        $nuevoServicio->periodificacion_proveedor = "anual";

        $nuevoServicio->save();

        }

        return redirect()->route('listadoServicios'); 

    }



    public function importServiciosMantenimientos(){

        $servicios = Bdmantenimientos::where('ACTIVO','!=',0)->get();


        foreach($servicios as $servicio){

            $nuevoServicio = new Servicio;

            $nuevoServicio->servicio = Bdmantenimientosdo::where('ID-MANT',$servicio->ID_MANT)->first()->SERVICIO;
            $nuevoServicio->plan_id = null;
            $nuevoServicio->tipo_id = $servicio->SERVICIO;
            $nuevoServicio->distribuidor_id = null;
            $nuevoServicio->factura_distribuidor = false;
            $nuevoServicio->comision_distribuidor = false; 
            $nuevoServicio->proveedor_id = null ;
            
            $consultaCliente = Cliente::where('nombre' , $servicio->CLIENTE)->first();

            if($consultaCliente == null){
                $IdCliente = 1;
            }else{
                $IdCliente = $consultaCliente->id;
            }

            
            $nuevoServicio->cliente_id = $IdCliente;
            $nuevoServicio->fecha_alta = $servicio->FECHA_CONTRATACION;
            $nuevoServicio->fecha_expiracion = \Carbon\Carbon::createFromDate($servicio->FECHA_CONTRATACION)->format('2023-m-d H:i:s');
            $nuevoServicio->fecha_baja =  $servicio->FECHA_BAJA;
            $nuevoServicio->notas = $servicio->NOTAS;
            $nuevoServicio->estado_id = 1;

            if($servicio->mail_contacto == null){
                $nuevoServicio->mail_administrativo = "controlsys@controlsys.es";
            }else{
                $nuevoServicio->mail_administrativo = $servicio->mail_contacto;
            }

            $nuevoServicio->observaciones = "";
            $nuevoServicio->observaciones_migracion = "";
            $nuevoServicio->precio = $servicio->IMPORTE_INICIAL;


            switch (Str::lower($servicio->PERIODIFICACION_CLIENTE)) {
                case 'mensual':
                    $nuevoServicio->periodificacion_cliente = Str::lower($servicio->PERIODIFICACION_CLIENTE);
                    break;
                case 'trimestral':
                    $nuevoServicio->periodificacion_cliente = Str::lower($servicio->PERIODIFICACION_CLIENTE);
                    break;
                case 'semestral':
                    $nuevoServicio->periodificacion_cliente = Str::lower($servicio->PERIODIFICACION_CLIENTE);
                    break;
                case 'anual':
                    $nuevoServicio->periodificacion_cliente = Str::lower($servicio->PERIODIFICACION_CLIENTE);
                    break;
                default:
                $nuevoServicio->periodificacion_cliente = "anual";
            }


            switch (Str::lower($servicio->PERIODIFICACION_PAGO_PROVEEDOR)) {
                case 'mensual':
                    $nuevoServicio->periodificacion_proveedor = Str::lower($servicio->PERIODIFICACION_PAGO_PROVEEDOR);
                    break;
                case 'trimestral':
                    $nuevoServicio->periodificacion_proveedor = Str::lower($servicio->PERIODIFICACION_PAGO_PROVEEDOR);
                    break;
                case 'semestral':
                    $nuevoServicio->periodificacion_proveedor = Str::lower($servicio->PERIODIFICACION_PAGO_PROVEEDOR);
                    break;
                case 'anual':
                    $nuevoServicio->periodificacion_proveedor = Str::lower($servicio->PERIODIFICACION_PAGO_PROVEEDOR);
                    break;
                default:
                $nuevoServicio->periodificacion_proveedor = "anual";
            }


            $nuevoServicio->save();
        }

        return redirect()->route('listadoServicios'); 
    }
  
}
