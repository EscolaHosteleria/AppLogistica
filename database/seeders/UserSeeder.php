<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    private $arrayUsers = array(
        array(
            "name" => "Administrador",
            "email" => "admin@hostaleria.net",
            "password" => "12345678",
            "rol_id" => "4"
        ),
        array(
            "name" => "Economat",
            "email" => "economat@hostaleria.net",
            "password" => "12345678",
            "rol_id" => "3"
        ),
        array(
            "name" => "Alumne",
            "email" => "alumne@hostaleria.net",
            "password" => "12345678",
            "rol_id" => "1"
        ),
        array(
            "name" => "Ramon",
            "email" => "ramon@hostaleria.net",
            "password" => "12345678",
            "rol_id" => "2"
        ),
        array(
            "name" => "Xavi B.",
            "email" => "xavib@hostaleria.net",
            "password" => "12345678",
            "rol_id" => "2"
        ),
        array(
            "name" => "Jordi",
            "email" => "jordi@hostaleria.net",
            "password" => "12345678",
            "rol_id" => "2"
        ),
        array(
            "name" => "Virginia",
            "email" => "virginia@hostaleria.net",
            "password" => "12345678",
            "rol_id" => "2"
        ),

    );

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        self::seedUser();
        $this->command->info('Tabla Users inicializada con datos!');
    }

    /**
     *
     * @return void
     */
    private function seedUser()
    {
        DB::table('users')->truncate();
        foreach($this->arrayUsers as $user ) {
            $u = new User();
            $u->name = $user['name'];
            $u->email = $user['email'];
            $u->password = Hash::make($user['password']);
            $u->rol_id = $user['rol_id'];
            $u->save();
        }
    }
}
