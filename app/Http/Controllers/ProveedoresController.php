<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Proveedore;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProveedorExportacion;
use PDF;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view("proveedores.listadoProveedores",['user'=> $user]);
    }

    public function crearProveedores(){
        $user = Auth::user();
        return view("proveedores.crearProveedores",['user'=> $user]);
    }

    public function crearProveedorDatos(Request $request){
        $proveedor = new Proveedore;
        $proveedor->nombre = $request->nombre;
        $proveedor->save();

        return redirect()->route('listadoProveedores');
    }

    public function editarProveedorForm($idProveedor){
            $user = Auth::user();
            $proveedor = Proveedore::find($idProveedor);
            return view("proveedores.editarProveedores",["proveedor"=> $proveedor, "user"=> $user]);
    }

    public function editarDatosProveedor(Request $request){
        Proveedore::where('id', $request->idOculto)
        ->update(['nombre' => $request->nombre]);

        return redirect()->back();
    }

    public function eliminarProveedores($idProveedor){
        Proveedore::where("id",$idProveedor)->delete();
        return redirect()->back();
    }


    public function exportarPDF(){ 

        $proveedores = session('listadoProveedores');
        $pdf = \PDF::loadView('proveedores.listadoProveedoresPDF', compact('proveedores')); 
        return $pdf->download('proveedores.pdf');

    }

    public function exportarExcel(){
        $proveedores = session('listadoProveedores');
        return Excel::download(new ProveedorExportacion($proveedores), 'proveedores.xlsx');
    }

}
