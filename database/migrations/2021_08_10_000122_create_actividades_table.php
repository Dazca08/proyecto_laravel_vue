<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Administracion\Actividad;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->string("nombre");
            $table->text("url");
            $table->integer("estado");
            $table->timestamps();
        });

        $actividad = Actividad::create([
            'categoria_id' => 1,
            'nombre' => 'Usuarios',
            'url' => 'administracion/seguridad/usuarios',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 1,
            'nombre' => 'Roles',
            'url' => 'administracion/seguridad/roles',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 2,
            'nombre' => 'Armada Nacional',
            'url' => 'administracion/datos-basicos/info_armada',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 2,
            'nombre' => 'Lista De Chequeo',
            'url' => 'administracion/datos-basicos/lista_chequeo',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 2,
            'nombre' => 'Jefaturas',
            'url' => 'administracion/datos-basicos/jefaturas',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 2,
            'nombre' => 'Procesos',
            'url' => 'administracion/datos-basicos/procesos',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 2,
            'nombre' => 'Conceptos',
            'url' => 'administracion/datos-basicos/conceptos',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 2,
            'nombre' => 'Temporizadores',
            'url' => 'administracion/datos-basicos/temporizadores',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 2,
            'nombre' => 'Unidades de Medida',
            'url' => 'administracion/datos-basicos/unidades_de_medida',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 4,
            'nombre' => 'Gestionar',
            'url' => 'riesgos/riesgos/gestionar',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 4,
            'nombre' => 'Activar',
            'url' => 'riesgos/riesgos/activar',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 5,
            'nombre' => 'Controles',
            'url' => 'riesgos/reportes/controles',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 5,
            'nombre' => 'Por clase',
            'url' => 'riesgos/reportes/por_clase',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 5,
            'nombre' => 'Valoracion',
            'url' => 'riesgos/reportes/valoracion',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 5,
            'nombre' => 'Matriz',
            'url' => 'riesgos/reportes/matriz',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 5,
            'nombre' => 'Manejo',
            'url' => 'riesgos/reportes/manejo',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 6,
            'nombre' => 'Matrices de riesgo',
            'url' => 'riesgos/ajustes/matrices_riesgo',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 6,
            'nombre' => 'Clases',
            'url' => 'riesgos/ajustes/clases',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 6,
            'nombre' => 'Agentes Generadores',
            'url' => 'riesgos/ajustes/agentes_generadores',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 6,
            'nombre' => 'Valoracion',
            'url' => 'riesgos/ajustes/valoracion',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 6,
            'nombre' => 'Clases de controles',
            'url' => 'riesgos/ajustes/clases_controles',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 7,
            'nombre' => 'Gestionar',
            'url' => 'riesgos/preguntas_DAFP/gestionar',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 8,
            'nombre' => 'Gestionar',
            'url' => 'riesgos/materializacion/gestionar',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 9,
            'nombre' => 'Tipos',
            'url' => 'documentos/ajustes/tipos',
            'estado' => 1
        ]);

        $actividad = Actividad::create([
            'categoria_id' => 10,
            'nombre' => 'Gestionar',
            'url' => 'documentos/documentos/gestionar',
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
        Schema::dropIfExists('actividades');
    }
}
