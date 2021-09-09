<?php

namespace App\Http\Controllers\Riesgos\Ajustes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Riesgos\Ajustes\Clases;
use App\Models\Riesgos\Ajustes\MatrizRiesgo;
use App\Models\Riesgos\Ajustes\AgentesGeneradores;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class ClasesController extends Controller
{
    public function index(){
    	return view("riesgos.ajustes.clases.inicio-clases");
    }

    public function lista(){

    	//$clases =Clases::all();
    	$clases = Clases::where('estado' ,'>=', 0)->with('matriz')->get();
    	return $clases;
    }

    public function destroy($idClase){

    	//$clase= Clases::find($idClase);
    	if(Clases::findOrFail($idClase)->delete()){
    		$this->eliminarTablaPivot($idClase);
    	}

    }

    public function listaMatrices(){

    	$matrices = MatrizRiesgo::all(['id as value' , 'nombre as label']);
    	return $matrices;
    }

     public function listaAgentesActivos(){

    	$agentes = AgentesGeneradores::where('estado', 1)->get(['id as value' , 'nombre as label']);
    	return $agentes;
    }


    public function listaAgentesAsignados($idClase){

    	$agentes =DB::table('clases_agentes_pivot')->where('deleted_at' , null)->where('clase_id' , $idClase)->get(['agente_id']);
    	return $agentes->pluck('agente_id');
    }


    public function store(Request $request){

    	$clase=collect($request)->except(['agentes'])->toArray();
    	if(Clases::create($clase)){
	    	$clases= Clases::all(['id']);
			$claseCreada=$clases->last();
			$this->llenarTablaPivot($request['agentes'] , $claseCreada->id);

    	}

    }
    public function update(Request $request , $idClase){

    	$clase=collect($request)->except(['agentes'])->toArray();
    	if(Clases::findOrFail($idClase)->update($clase)){
			$this->ActualizarTablaPivot($request['agentes'] , $idClase);
    	}	


    }

    public function llenarTablaPivot($listaAgentes , $idClase){

    	    $now=now();
			foreach ($listaAgentes as $key => $agente) {
				DB::table('clases_agentes_pivot')->insert([
				    'agente_id' => $agente,
				    'clase_id' => $idClase,
				    'created_at'=>$now,
				    'updated_at'=>$now
				]);
			}
    }

    public function eliminarTablaPivot($idClase){
			$now=now();
    	    $affected =DB::table('clases_agentes_pivot')
              ->where('clase_id', $idClase)
              ->update(['deleted_at' => $now]);
    }


   	 public function ActualizarTablaPivot($agentesNuevos , $idClase){
			   $this->eliminarTablaPivot($idClase);
			   $this->llenarTablaPivot($agentesNuevos , $idClase);

			
    }
}
