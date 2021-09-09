<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Administracion\Categoria;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modulo_id')->constrained('modulos');
            $table->string("nombre");
            $table->integer("estado");
            $table->timestamps();
        });

        $categoria = Categoria::create([
            'modulo_id' => 1,
            'nombre' => 'Seguridad',
            'estado' => 1
        ]);

        $categoria = Categoria::create([
            'modulo_id' => 1,
            'nombre' => 'Datos Básicos',
            'estado' => 1
        ]);

        $categoria = Categoria::create([
            'modulo_id' => 4,
            'nombre' => 'Mis Responsabilidades',
            'estado' => 1
        ]);

        $categoria = Categoria::create([
            'modulo_id' => 4,
            'nombre' => 'Riesgos',
            'estado' => 1
        ]);

        $categoria = Categoria::create([
            'modulo_id' => 4,
            'nombre' => 'Reportes',
            'estado' => 1
        ]);

        $categoria = Categoria::create([
            'modulo_id' => 4,
            'nombre' => 'Ajustes',
            'estado' => 1
        ]);

        $categoria = Categoria::create([
            'modulo_id' => 4,
            'nombre' => 'Preguntas segun el DAFP',
            'estado' => 1
        ]);

        $categoria = Categoria::create([
            'modulo_id' => 4,
            'nombre' => 'Materializacion',
            'estado' => 1
        ]);

        $categoria = Categoria::create([
            'modulo_id' => 2,
            'nombre' => 'Ajustes',
            'estado' => 1
        ]);

        $categoria = Categoria::create([
            'modulo_id' => 2,
            'nombre' => 'Documentos',
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
        Schema::dropIfExists('categorias');
    }
}
