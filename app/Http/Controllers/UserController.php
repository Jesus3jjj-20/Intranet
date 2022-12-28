<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $roles = Rol::all();
        return view("usuarios.perfil",["user"=>$user,"roles"=>$roles]);
    }

    public function cerrarSesion(){
        Auth::logout();
        return redirect('/');
    }

    public function actualizarInformacion(Request $request){
        $user = Auth::user();

        User::where('id', $request->idOculto)
        ->update(['name' => $request->nombre, 'email'=>$request->email, 'rol_id'=> $request->rol]);

        return redirect()->back();
    }


    public function cambiarImagenPerfil(Request $request){
        $imagenActual = User::find($request->idOculto)->avatar;
        $ruta = public_path("imagenes-perfiles/");
        
        if (isset($_POST['cambiar'])) {

            $error = "";
            $nombreImagenSeleccionada = ($request->file("imgPerfilSeleccionada") != null) ? $request->file("imgPerfilSeleccionada")->getClientOriginalName() : "";

            if($imagenActual == "defecto.png"){
                  //  Storage::put("public/imagenes-perfiles/" . $nombreImagenSeleccionada , \File::get($request->file('imgPerfilSeleccionada')) );

                  if(($request->file("imgPerfilSeleccionada") != null)){

                    $request->file("imgPerfilSeleccionada")->move($ruta,$nombreImagenSeleccionada); 

                    User::where('id',$request->idOculto)
                    ->update(['avatar' => $nombreImagenSeleccionada]);
                  }

                 
            }else{

                //Storage::put("public/imagenes-perfiles/" . $nombreImagenSeleccionada , \File::get($request->file('imgPerfilSeleccionada')) );
                //Storage::delete('public/imagenes-perfiles/' . $imagenActual);

                if(($request->file("imgPerfilSeleccionada") != null)){

                    $request->file("imgPerfilSeleccionada")->move($ruta,$nombreImagenSeleccionada);
                    File::delete('imagenes-perfiles/'. $imagenActual); 

                    User::where('id',$request->idOculto)
                    ->update(['avatar' => $nombreImagenSeleccionada]);
                }
            }
        }else{

            if($imagenActual != "defecto.png"){
              //  Storage::delete('public/imagenes-perfiles/' . $imagenActual);
              File::delete('imagenes-perfiles/'. $imagenActual);

                User::where('id',$request->idOculto)
                ->update(['avatar' => "defecto.png"]);
            }
            
        }
        

        return redirect()->back();

    }

    
    public function resetearContrasenna(Request $request){

        if($request->contrasenna != "" && $request->confirmarContrasenna != ""){

            if($request->contrasenna == $request->confirmarContrasenna){

                User::where('id',$request->idOculto)
                ->update(['password' => Hash::make($request->contrasenna)]);

                return redirect()->back();
            }

        }

    }


    public function administracion(){
        $user = Auth::user();
        return view('usuarios/admin',["user"=> $user]);
    }


    public function administracionUsuarios(){
        $user = Auth::user();
        return view('usuarios/administracionUsuarios',["user"=> $user]);
    }

    public function creacionUsuarios(){
        $user = Auth::user();
        $roles = Rol::all();
        return view('usuarios/creacionUsuarios',["user"=> $user,"roles"=>$roles]);
    }


    public function creacionUsuariosDatos(Request $request){

        if($request->password != "" && $request->confirmarPassword != ""){

            if($request->password == $request->confirmarPassword){

                $usuario = new User;
                $usuario->name = $request->nombre;
                $usuario->email = $request->email;
                $usuario->avatar = "defecto.png";
                $usuario->password = Hash::make($request->password);
                $usuario->rol_id = $request->rol;
                $usuario->save();

                return redirect()->route('editarUsuarios');

            }

        }

    }

    public function editarUsuarios(){
        $user = Auth::user();
        return view('usuarios.editarUsuarios',["user"=>$user]);

    }

    public function editarUsuariosForm($idUsuario){
        $user = Auth::user();
        $usuario = User::find($idUsuario);
        $roles = Rol::all();
        return view('usuarios.formularioEditar',["user"=> $user, "usuario"=> $usuario, "roles"=>$roles]);
    }

    public function eliminarUsuariosListado(){
        $user = Auth::user();
        $usuarios = User::all();
        return view('usuarios.eliminarUsuarios',["user"=>$user, "usuarios"=>$usuarios]);

    }

    public function eliminarUsuario($idUsuario){
        User::where("id",$idUsuario)->delete();
        return redirect()->back();
    }


    public function creacionRoles(){
        $user = Auth::user();
        $roles = Rol::all();
        return view("usuarios.creacionRoles",["user"=> $user, "roles"=>$roles]);
    }

    public function guardarNuevoRol(Request $request){
        $rol = new Rol;
        $rol->nombre = $request->nombre;
        $rol->admin = $request->rol;
        $rol->save();

        return redirect()->route('creacionRoles');
    }

    public function modificacionesRoles(Request $request){

        if (isset($_POST['actualizar'])) {

            Rol::where('id', $request->idOculto)
              ->update(['nombre' => $request->nombre,
                        'admin' => $request->rol 
                      ]);
        }else{
            Rol::where("id",$request->idOculto)->delete();
        }

        return redirect()->back();

    }

}
