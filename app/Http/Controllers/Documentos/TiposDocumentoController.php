<?php

namespace App\Http\Controllers\Documentos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Documentos\TiposDocumento;

class TiposDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('documentos.ajustes.tipos_documento');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tipo_documento = new TiposDocumento;
        $tipo_documento->create($request->all());
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
    public function update(Request $request, $id_tipo_documento)
    {
        $tipo_documento = TiposDocumento::find($id_tipo_documento);
        $tipo_documento->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_tipo_documento)
    {
        $tipo_documento = TiposDocumento::find($id_tipo_documento);
        $tipo_documento->delete();
    }

    public function getTiposDocumento(Request $request)
    {
        $tipos_documento = TiposDocumento::all();
        return response()->json(json_decode($tipos_documento), 200);
    }
}
