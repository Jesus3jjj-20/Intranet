<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plan;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PlanExportacion;
use PDF;

class PlanesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('planes.listadoPlanes', ['user' => $user]);
    }

    public function crearPlan(){
        $user = Auth::user();
        return view('planes.crearPlanes', ['user' => $user]);
    }


    public function insertarDatos(Request $request){
        $user = Auth::user();

        $plan = new Plan;
        $plan->nombre = $request->nombre;
        $plan->save();

        return redirect()->route('listadoPlanes');
    }

    public function editarPlanes($idPlan){
        $user = Auth::user();
        $plan =  Plan::find($idPlan);
        return view("planes.editarPlanes", ["user"=>$user, "plan"=>$plan]);
    }

    public function actualizarPlan(Request $request){
        Plan::where('id', $request->idOculto)
        ->update(['nombre' => $request->nombre]);

        return redirect()->back();
    }


    public function eliminarPlan($idPlan){
        Plan::where("id",$idPlan)->delete();
        return redirect()->back();
    }


    public function exportarPDF(){ 

        $planes = session('listadoPlanes');
        $pdf = \PDF::loadView('planes.listadoPlanesPDF', compact('planes')); 
        return $pdf->download('planes.pdf');

    }

    public function exportarExcel(){
        $planes = session('listadoPlanes');
        return Excel::download(new PlanExportacion($planes), 'planes.xlsx');
    }

}
