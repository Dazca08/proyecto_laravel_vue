<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasesAgentesgeneradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases_agentes_pivot', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('agente_id')->constrained('agentes_generadores');
            $table->foreignId('clase_id')->constrained('clases');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clases_agentes_pivot');
    }
}
