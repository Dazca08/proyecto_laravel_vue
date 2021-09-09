<?php
use App\Http\Controllers\Riesgos\RiesgosController;
use App\Http\Controllers\Riesgos\Ajustes\AgentesGeneradoresController;
use App\Http\Controllers\Riesgos\Ajustes\ClasesControlesController;
use App\Http\Controllers\Riesgos\Ajustes\ClasesController;

Route::group(['prefix' => 'riesgos'], function(){
    Route::get('/',  [RiesgosController::class, 'getHome']);
   //Ajustes->AgentesGeneradores
   Route::get('/ajustes/agentes_generadores/lista-agentes',  [AgentesGeneradoresController::class, 'listaAgentesGeneradores']);
   Route::apiResource('/ajustes/agentes_generadores', AgentesGeneradoresController::class);
   
   //Ajustes->ClasesControles
   Route::get('/ajustes/clases_controles/lista',  [ClasesControlesController::class, 'lista']);
   Route::apiResource('/ajustes/clases_controles', ClasesControlesController::class);

   //Ajustes-->Clases
   Route::get('/ajustes/clases/lista',  [ClasesController::class, 'lista']);
   Route::get('/ajustes/clases/lista-matrices',  [ClasesController::class, 'listaMatrices']);
   Route::get('/ajustes/clases/lista-agentes-activos',  [ClasesController::class, 'listaAgentesActivos']);
   Route::get('/ajustes/clases/lista-agentes-asignados/{id}',  [ClasesController::class, 'listaAgentesAsignados']);
   Route::apiResource('/ajustes/clases', ClasesController::class);

});