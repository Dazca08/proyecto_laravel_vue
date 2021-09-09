<?php

namespace App\Http\Controllers\Riesgos\Ajustes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Riesgos\Ajustes\AgentesGeneradores;
use App\Models\ParametrosDetalle;
class AgentesGeneradoresController extends Controller
{
     public function index(){
    	return view("riesgos.ajustes.agentes-generadores.inicio-agentes-generadores");
    }

    public function listaAgentesGeneradores(){
    	$agentes = AgentesGeneradores::where('estado' ,'>=', 0)->with('tipo')->get();
    	return $agentes;
    }

    public function destroy($idAgente){
    	$agente= AgentesGeneradores::find($idAgente);
    	$agente->delete();
    }

    public function store(Request $request){

    	$agente = new AgentesGeneradores;
    	$agente->create($request->all());

    }
    public function update(Request $request , $idAgente){

    	$agente = AgentesGeneradores::find($idAgente);
    	$agente->update($request->all());

    }
}
