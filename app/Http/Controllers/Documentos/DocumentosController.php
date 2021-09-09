<?php

namespace App\Http\Controllers\Documentos;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Documentos\TiposDocumento;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;

class DocumentosController extends Controller
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
        return view('documentos.home_documentos');
    }

    public function getIndexTiposDocumento()
    {
        return view('documentos.ajustes.tipos_documento');
    }

    public function getIndexGestionar()
    {
        return view('documentos.documentos.gestionar');
    }

    public function crearActualizarTipoDocumento(Request $request)
    {
        $datos = json_decode($request["form"]);

        if ($datos->id == "") {
            $tipo_documento = new TiposDocumento;
        } else {
            $tipo_documento = TiposDocumento::find($datos->id);
            $tipo_documento->estado = $datos->estado;
        }
        $tipo_documento->nombre = $datos->nombre;
        $tipo_documento->abreviatura = $datos->abreviatura;

        $tipo_documento->save();

        if ($tipo_documento) {
            return response()->json(200);
        }
    }

    public function getTiposDocumento(Request $request)
    {
        $tipos_documento = TiposDocumento::all();
        return response()->json(json_decode($tipos_documento), 200);
    }

    public function getListadoTiposDocumento(Request $request)
    {
        $tipos_documento = TiposDocumento::where("estado", 1)->get();
        foreach ($tipos_documento as $key => $tp) {
            $data[] = [
                'value' => $tp->id,
                'text' => $tp->nombre
            ];
        }
        return response()->json($data, 200);
    }
}
