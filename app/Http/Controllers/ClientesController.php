<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClienteExportacion;
use PDF;



class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view("clientes.listadoClientes",['user'=> $user]);
    }


    public function crearClientes()
    {
        $user = Auth::user();
        return view("clientes.crearClientes",['user'=> $user]);
    }

    public function editarClienteForm($idCliente)
    {
        $user = Auth::user();
        $cliente = Cliente::find($idCliente);
        return view("clientes.editarClientes",['user'=> $user,'cliente'=>$cliente]);
    }

    public function editarDatosCliente(Request $request){

        Cliente::where('id', $request->idOculto)
        ->update(['nombre' => $request->nombre, 'email'=>$request->email]);

        return redirect()->back();

    }

    public function eliminarCliente($idCliente){
        Cliente::where("id",$idCliente)->delete();
        return redirect()->back();
    }

    public function crearClienteDatos(Request $request){
            $cliente = new Cliente;
            $cliente->nombre = $request->nombre;
            $cliente->email = $request->email;
            $cliente->save();

            return redirect()->route('listadoClientes');
    }

    public function exportarPDF(){ 

        $clientes = session('listadoClientes');
        $pdf = \PDF::loadView('clientes.listadoClientesPDF', compact('clientes')); 
        return $pdf->download('clientes.pdf');

    }

    public function exportarExcel(){
        $clientes = session('listadoClientes');
        return Excel::download(new ClienteExportacion($clientes), 'clientes.xlsx');
    }

}
