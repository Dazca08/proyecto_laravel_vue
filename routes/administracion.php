<?php
use App\Http\Controllers\Administracion\AdministracionController;
use App\Http\Controllers\Administracion\Seguridad\UsuariosController;
use App\Http\Controllers\Administracion\Datos_Basicos\UnidadesMedidasController;

Route::group(['prefix' => 'administracion'], function(){
    Route::get('/',  [AdministracionController::class, 'getHome']);
    Route::get('/seguridad/usuarios', [AdministracionController::class, 'getUsuarios']);
    Route::post('/seguridad/usuarios/ver', [UsuariosController::class, 'index']);
    Route::post('/seguridad/usuarios/crear', [UsuariosController::class, 'store']);
    Route::get('/seguridad/roles', [AdministracionController::class, 'getRoles']);
    Route::get('/datos-basicos/temporizadores', [AdministracionController::class, 'getTemporizadoresView']);
    Route::get('/datos-basicos/unidades-de-medida/getAll', [UnidadesMedidasController::class, 'getAll']);
    Route::apiResource('/datos-basicos/unidades-de-medida', UnidadesMedidasController::class);
}); 