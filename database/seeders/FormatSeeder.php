<?php

namespace Database\Seeders;

use App\Models\Format;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormatSeeder extends Seeder
{
    private $arrayFormats = array(
        array(
            'id' => '1',
            'name' => 'KG'
        ),
        array(
            'id' => '2',
            'name' => 'GRAMS'
        ),
        array(
            'id' => '3',
            'name' => 'MANAT'
        ),
        array(
            'id' => '4',
            'name' => 'POT'
        ),
        array(
            'id' => '5',
            'name' => 'FARDO'
        ),
        array(
            'id' => '6',
            'name' => 'CAIXA'
        ),
        array(
            'id' => '7',
            'name' => 'SAFATA'
        ),
        array(
            'id' => '8',
            'name' => 'UNITATS'
        ),
        array(
            'id' => '9',
            'name' => 'BOSSA'
        ),
        array(
            'id' => '10',
            'name' => 'PACK'
        ),
        array(
            'id' => '11',
            'name' => 'LLAUNA GRAN'
        ),
        array(
            'id' => '12',
            'name' => 'LLAUNA PETITA'
        ),
        array(
            'id' => '13',
            'name' => 'AMPOLLA'
        ),
        array(
            'id' => '14',
            'name' => 'BAINA'
        ),
        array(
            'id' => '15',
            'name' => 'DOTZENA'
        ),
        array(
            'id' => '16',
            'name' => 'LITRES'
        ),
        array(
            'id' => '17',
            'name' => 'BOSSETA'
        ),
        array(
            'id' => '18',
            'name' => 'CAIXA 500GR'
        ),
        array(
            'id' => '19',
            'name' => 'UNITAT'
        ),
        array(
            'id' => '20',
            'name' => 'BULB'
        ),
        array(
            'id' => '21',
            'name' => 'TALLS'
        ),
        array(
            'id' => '22',
            'name' => 'SOBRE'
        ),
        array(
            'id' => '23',
            'name' => 'LLAUNA'
        ),
        array(
            'id' => '24',
            'name' => 'PAQUET'
        ),
        array(
            'id' => '25',
            'name' => 'RISTRA'
        ),
        array(
            'id' => '26',
            'name' => 'GALLEDA'
        ),
        array(
            'id' => '27',
            'name' => 'BIDÓ'
        ),
        array(
            'id' => '28',
            'name' => 'ROTLLE'
        ),
        array(
            'id' => '29',
            'name' => 'GARRAFA'
        )
    );
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        self::seedFormat();
        $this->command->info('Tabla formatos inicializada con datos!');
    }

    /**
     *
     * @return void
     */
    private function seedFormat()
    {
        DB::table('formats')->delete();
        foreach( $this->arrayFormats as $format ) {
            $f = new Format();
            $f->name = $format['name'];
            $f->save();
        }
    }
}
