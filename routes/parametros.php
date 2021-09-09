<?php
use App\Http\Controllers\ParametrosDetallesController;

Route::group(['prefix' => 'parametros'], function(){

   Route::get('/retorno-parametros-multiselect/{id}',  [ParametrosDetallesController::class, 'retornarParametrosMultiselect']);
   Route::get('/retorno-parametros/{id}',  [ParametrosDetallesController::class, 'retornarParametros']);
   Route::apiResource('/gestion', ParametrosDetallesController::class);

});