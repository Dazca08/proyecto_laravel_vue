<?php

use App\Http\Controllers\Documentos\DocumentosController;
use App\Http\Controllers\Documentos\TiposDocumentoController;

Route::group(['prefix' => 'documentos'], function () {
    Route::get('/',  [DocumentosController::class, 'getHome']);

    Route::apiResource('/ajustes/tipos-documento', TiposDocumentoController::class);
    Route::post('ajustes/tipos/getTiposDocumento',  [TiposDocumentoController::class, 'getTiposDocumento']);

    // Route::post('ajustes/tipos/getListadoTiposDocumento',  [DocumentosController::class, 'getListadoTiposDocumento']);

    // Route::get('documentos/gestionar',  [DocumentosController::class, 'getIndexGestionar']);
    // Route::post('documentos/gestionar/buscarDocumentos',  [DocumentosController::class, 'buscarDocumentos']);
    // Route::post('documentos/gestionar/crearNuevoDocumento',  [DocumentosController::class, 'crearNuevoDocumento']);
});
