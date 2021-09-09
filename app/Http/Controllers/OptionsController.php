<?php

namespace App\Http\Controllers;

use App\Models\Options;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    public function getParametroDetalles(Request $request){
        
        $options = new Options();
        $parametro_id = $request['parametro_id'];

        $resultado = $options->getParametroDetalles($parametro_id);
        return response()->json($resultado, 200);
    }
}
