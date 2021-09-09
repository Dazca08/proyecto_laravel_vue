<?php
use App\Http\Controllers\OptionsController;

Route::group(['prefix' => 'options'], function(){
    Route::post('/getParametroDetalles',  [OptionsController::class, 'getParametroDetalles']);
});