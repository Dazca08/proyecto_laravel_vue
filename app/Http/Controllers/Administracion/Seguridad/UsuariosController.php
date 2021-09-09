<?php

namespace App\Http\Controllers\Administracion\Seguridad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index(){
        $usuario = User::all();
    	return response()->json($usuario, 200);
    }

    public function destroy($id){
    	$usuario = User::find($id);
    	$usuario->delete();
    }

    public function store(Request $request){
    	$usuario = new User;
        var_dump($request);
        $usuario->name = $request->nombre;
        $usuario->descripcion = $request->descripcion;
        $usuario->email = $request->usr;
        $usuario->correo = $request->email;
        $usuario->dominio = $request->dominio;
        $usuario->password = Hash::make($request->contrasena);
        $usuario->expiracion = $request->expiracion;
        $usuario->estado = 1;
        if ($usuario->save()) {
            dd($usuario);
            return response()->json(200);
        }

        return $usuario;
    }
    public function update(User $request , $id){

    	$usuario = User::find($id);
    	$usuario->update($request->all());

    }
}
