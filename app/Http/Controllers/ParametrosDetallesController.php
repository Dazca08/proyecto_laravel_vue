<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParametrosDetalle;
class ParametrosDetallesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function retornarParametrosMultiselect($id){
        $parametros = ParametrosDetalle::where('parametro_id', $id)->where('estado' , 1)->get(['id as value' , 'descripcion as label']);
        return $parametros;
    }

    public function retornarParametros($id){
        $parametros = ParametrosDetalle::where('parametro_id', $id)->where('estado' , 1)->get();
        return $parametros;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
