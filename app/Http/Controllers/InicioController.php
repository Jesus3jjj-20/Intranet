<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view("inicio.inicio", ['user'=> $user]);
    }


    public function calendario(){
        $user = Auth::user();
        return view("inicio.calendario",['user'=>$user]);
    }

}
