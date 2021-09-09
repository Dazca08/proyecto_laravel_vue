<?php
use App\Http\Controllers\Mejoras\MejorasController;

Route::group(['prefix' => 'mejoras'], function(){
    Route::get('/',  [MejorasController::class, 'getHome']);
});