<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distribuidor;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DistribuidorExportacion;
use PDF;

class DistribuidoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view("distribuidores.listadoDistribuidores",['user'=> $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearDistribuidores()
    {
        $user = Auth::user();
        return view("distribuidores.crearDistribuidores",['user'=> $user]);
    }

    public function crearDistribuidorDatos(Request $request){
        $distribuidor = new Distribuidor;
        $distribuidor->nombre = $request->nombre;
        $distribuidor->save();

        return redirect()->route('listadoDistribuidores');
    }

   
    public function editarDistribuidorForm($idDistribuidor){
        $user = Auth::user();
        $distribuidor = Distribuidor::find($idDistribuidor);

        return view("distribuidores/editarDistribuidores",["user"=>$user, "distribuidor"=>$distribuidor]);

    }

    public function editarDatosDistribuidor(Request $request){

        Distribuidor::where('id', $request->idOculto)
        ->update(['nombre' => $request->nombre]);

        return redirect()->back();

    }

    public function eliminarDistribuidor($idDistribuidor){
        Distribuidor::where("id",$idDistribuidor)->delete();
        return redirect()->back();
    }

    public function exportarPDF(){ 

        $distribuidores = session('listadoDistribuidores');
        $pdf = \PDF::loadView('distribuidores.listadoDistribuidoresPDF', compact('distribuidores')); 
        return $pdf->download('distribuidores.pdf');

    }

    public function exportarExcel(){
        $distribuidores = session('listadoDistribuidores');
        return Excel::download(new DistribuidorExportacion($distribuidores), 'distribuidores.xlsx');
    }


}
