<?php

namespace App\Http\Controllers\Administracion\Datos_Basicos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administracion\Datos_Basicos\UnidadesMedidas;

class UnidadesMedidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administracion.datos_basicos.unidades_de_medida');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unidad = new UnidadesMedidas;
    	$unidad->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $unidad = UnidadesMedidas::find($id);
    	$unidad->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unidad= UnidadesMedidas::find($id);
    	$unidad->delete();
    }

    public function getAll()
    {
        $resultado = UnidadesMedidas::all();
        return response()->json($resultado, 200);
    }
}
