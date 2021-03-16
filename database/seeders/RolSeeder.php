<?php

namespace Database\Seeders;

use App\Models\Rol;
use Doctrine\DBAL\Schema\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{

    private $arrayRols = array(
        array(
            "rol" => "Alumnat"
        ),
        array(
            "rol" => "Professorat"
        ),
        array(
            "rol" => "Economat"
        ),
        array(
            "rol" => "Administrador"
        )
    );

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        self::seedRol();
        $this->command->info('Tabla Rols inicializada con datos!');
    }

    /**
     *
     * @return void
     */
    private function seedRol()
    {
        DB::table('rols')->truncate();
        foreach($this->arrayRols as $rol ) {
            $r = new Rol();
            $r->rol = $rol['rol'];
            $r->save();
        }
    }
}
