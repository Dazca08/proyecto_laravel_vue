<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("codigo");
            $table->text("descripcion");
            $table->integer("tipo_documento");
            $table->integer("flujo_documento");
            $table->integer("proceso");
            $table->integer("jefatura");
            $table->text("documentos_referentes");
            $table->integer("responsable");
            $table->integer("palabras_clave");
            $table->integer("listado_maestro");
            $table->integer("autor");
            $table->text("archivo");
            $table->text("comentario_version");
            $table->text("comentario_revision");
            $table->integer("estado");
            $table->integer("aprobacion");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
