<?php

namespace App\Http\Controllers\Administracion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AdministracionController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function getHome()
    {
        return view('administracion.home_administracion');
    }

    public function getUsuarios(){
        return view('administracion.seguridad.usuarios');
    }

    public function getRoles(){
        return view('administracion.seguridad.roles');
    }

    public function getTemporizadoresView(){
        return view('administracion.datos_basicos.temporizadores');
    }

    public function getUnidadesDeMedidaView(){
        return view('administracion.datos_basicos.unidades_de_medida');
    }

    public function getClasesTemporizadores(){
        
    }
    

    public function saveTemporizador(Request $request){
        
    }
}