<?php

namespace Database\Seeders;

use App\Models\Modulo;
use Illuminate\Database\Seeder;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modulo1 = new Modulo();
        $modulo1->nombre = "Administración";
        $modulo1->icono = "i-Computer-Secure";
        $modulo1->estado = 1;
        $modulo1->save;

        $modulo2 = new Modulo();
        $modulo2->nombre = "Documentos";
        $modulo2->icono = "i-Files";
        $modulo2->estado = 1;
        $modulo2->save;

        $modulo3 = new Modulo();
        $modulo3->nombre = "Indicadores";
        $modulo3->icono = "i-Bar-chart";
        $modulo3->estado = 1;
        $modulo3->save;

        $modulo4 = new Modulo();
        $modulo4->nombre = "Riesgos";
        $modulo4->icono = "i-Danger";
        $modulo4->estado = 1;
        $modulo4->save;

        $modulo5 = new Modulo();
        $modulo5->nombre = "Planes";
        $modulo5->icono = "i-Suitcase";
        $modulo5->estado = 1;
        $modulo5->save;

        $modulo6 = new Modulo();
        $modulo6->nombre = "Mejoras";
        $modulo6->icono = "i-Check";
        $modulo6->estado = 1;
        $modulo6->save;

        $modulo7 = new Modulo();
        $modulo7->nombre = "BSC";
        $modulo7->icono = "i-Dashboard";
        $modulo7->estado = 1;
        $modulo7->save;
    }
}
