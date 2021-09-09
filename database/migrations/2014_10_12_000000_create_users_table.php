<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('email')->unique();
            $table->string('correo')->nullable();
            $table->integer('dominio')->nullable();
            $table->string('password');
            $table->date('expiracion')->nullable();
            $table->integer('estado')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $user = User::create([
            'name' => 'Administrador Plataforma',
            'descripcion' => 'Este es el administrador',
            'email' => 'root',
            'correo' => 'root@armada.mil.co',
            'dominio' => 0,
            'password' => Hash::make('12345'),
            'espiracion' => date('Y-m-d'),
            'estado' => 1,
        ]);

        $user = User::create([
            'name' => 'Johan Cortes',
            'descripcion' => 'Este es el administrador',
            'email' => 'joco1204',
            'correo' => 'joco1204@gmail.com',
            'dominio' => 0,
            'password' => Hash::make('12345'),
            'espiracion' => date('Y-m-d'),
            'estado' => 1,
        ]);

        $user = User::create([
            'name' => 'Juan Modesto',
            'descripcion' => 'Este es el administrador',
            'email' => 'ingjuanmodesto',
            'correo' => 'ingjuanmodesto@gmail.com',
            'dominio' => 0,
            'password' => Hash::make('12345'),
            'espiracion' => date('Y-m-d'),
            'estado' => 1,
        ]);

        $user = User::create([
            'name' => 'Yeison Briceño',
            'descripcion' => 'Este es el administrador',
            'email' => 'yeison8921',
            'correo' => 'yeison8921@gmail.com',
            'dominio' => 0,
            'password' => Hash::make('12345'),
            'espiracion' => date('Y-m-d'),
            'estado' => 1,
        ]);

        $user = User::create([
            'name' => 'Juan Torres',
            'descripcion' => 'Este es el administrador',
            'email' => 'juand.torres',
            'correo' => 'juand.torres@gmail.com',
            'dominio' => 0,
            'password' => Hash::make('12345'),
            'espiracion' => date('Y-m-d'),
            'estado' => 1,
        ]);

        $user = User::create([
            'name' => 'Daniel Zambrano',
            'descripcion' => 'Este es el administrador',
            'email' => 'daniel1899',
            'correo' => 'daniel1899@hotmail.com',
            'dominio' => 0,
            'password' => Hash::make('12345'),
            'espiracion' => date('Y-m-d'),
            'estado' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
