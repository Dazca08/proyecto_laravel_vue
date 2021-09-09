<?php

namespace App\Http\Controllers\Riesgos\Ajustes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Riesgos\Ajustes\ClasesControles;
class ClasesControlesController extends Controller
{
    public function index(){
    	return view("riesgos.ajustes.clases-controles.inicio-clases-controles");
    }

    public function lista(){

    	$clases =ClasesControles::all();
    	return $clases;
    }

    public function destroy($idClase){
    	$clase= ClasesControles::find($idClase);
    	$clase->delete();

    }

    public function store(Request $request){

    	$clase = new ClasesControles;
    	$clase->create($request->all());

    }
    public function update(Request $request , $idClase){

    	$clase = ClasesControles::find($idClase);
    	$clase->update($request->all());

    }
}
