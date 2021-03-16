<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * @var string[][]
     */
    private $arrayCategories = array(
        array(
            'name' => 'Fruites i verdures'
        ),
        array(
            'name' => 'Carns i formatges'
        ),
        array(
            'name' => 'Farines'
        ),
        array(
            'name' => 'Economat'
        ),
        array(
            'name' => 'Congelats'
        ),
        array(
            'name' => 'Peix fresc'
        ),
        array(
            'name' => 'Ous'
        ),
        array(
            'name' => 'SOSA'
        ),
        array(
            'name' => 'Fruits secs'
        ),
        array(
            'name' => 'Làctics i xocolates'
        ),
        array(
            'name' => 'Neteja'
        )
    );

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        self::seedCategory();
        $this->command->info('Tabla categorías inicializada con datos!');
    }


    /**
     *
     * @return void
     */
    private function seedCategory()
    {
        DB::table('categories')->delete();
        foreach( $this->arrayCategories as $category ) {
            $c = new Category();
            $c->name = $category['name'];
            $c->save();
        }
    }
}
