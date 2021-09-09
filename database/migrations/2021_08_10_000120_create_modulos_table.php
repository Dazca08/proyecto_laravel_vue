<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Administracion\Modulo;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("icono");
            $table->integer("estado");
            $table->timestamps();
        });

        $modulo = Modulo::create([
            'nombre' => 'Administración',
            'icono' => 'i-Computer-Secure',
            'estado' => 1
        ]);

        $modulo = Modulo::create([
            'nombre' => 'Documentos',
            'icono' => 'i-Files',
            'estado' => 1
        ]);

        $modulo = Modulo::create([
            'nombre' => 'Indicadores',
            'icono' => 'i-Bar-Chart',
            'estado' => 1
        ]);

        $modulo = Modulo::create([
            'nombre' => 'Riesgos',
            'icono' => 'i-Danger',
            'estado' => 1
        ]);

        $modulo = Modulo::create([
            'nombre' => 'Planes',
            'icono' => 'i-Suitcase',
            'estado' => 1
        ]);

        $modulo = Modulo::create([
            'nombre' => 'Mejoras',
            'icono' => 'i-Check',
            'estado' => 1
        ]);

        $modulo = Modulo::create([
            'nombre' => 'BSC',
            'icono' => 'i-Dashboard',
            'estado' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos');
    }
}
