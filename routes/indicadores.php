<?php
use App\Http\Controllers\Indicadores\IndicadoresController;

Route::group(['prefix' => 'indicadores'], function(){
    Route::get('/',  [IndicadoresController::class, 'getHome']);
});