<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User();
        $user1->name = "Administrador Plataforma";
        $user1->email = "root@armada.mil.co";
        $user1->roll = 1;
        $user1->password = Hash::make('12345');
        $user1->status = 1;
        $user1->save;

        $user2 = new User();
        $user2->name = "Johan Cortes";
        $user2->email = "joco1204@gmail.com";
        $user2->roll = 1;
        $user2->password = Hash::make('12345');
        $user2->status = 1;
        $user2->save;

        $user3 = new User();
        $user3->name = "Juan Modesto";
        $user3->email = "ingjuanmodesto@gmail.com";
        $user3->roll = 1;
        $user3->password = Hash::make('12345');
        $user3->status = 1;
        $user3->save;

        $user4 = new User();
        $user4->name = "Yeison Briceño";
        $user4->email = "yeison8921@gmail.com";
        $user4->roll = 1;
        $user4->password = Hash::make('12345');
        $user4->status = 1;
        $user4->save;

        $user5 = new User();
        $user5->name = "Juan Torres";
        $user5->email = "juand.torres@gmail.com";
        $user5->roll = 1;
        $user5->password = Hash::make('12345');
        $user5->status = 1;
        $user5->save;

        $user6 = new User();
        $user6->name = "Daniel Zambrano";
        $user6->email = "cdaniel1899@hotmail.com";
        $user6->roll = 1;
        $user6->password = Hash::make('12345');
        $user6->status = 1;
        $user6->save;
    }
}
