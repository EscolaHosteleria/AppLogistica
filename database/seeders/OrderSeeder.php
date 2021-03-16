<?php

namespace Database\Seeders;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    private $arrayOrders = array(
        array('delivery_date' => '2020-01-01','user_name' => 'Professor1'),
        array('delivery_date' => '2020-02-01','user_name' => 'Professor1'),
        array('delivery_date' => '2020-03-01','user_name' => 'Professor1'),
        array('delivery_date' => '2020-04-01','user_name' => 'Professor1'),
        array('delivery_date' => '2020-05-01','user_name' => 'Professor1'),
        array('delivery_date' => '2020-06-01','user_name' => 'Professor1'),
        array('delivery_date' => '2020-07-01','user_name' => 'Professor1'),
        array('delivery_date' => '2020-08-01','user_name' => 'Professor1'),
        array('delivery_date' => '2020-09-01','user_name' => 'Professor1'),
        array('delivery_date' => '2020-10-01','user_name' => 'Professor1'),
        array('delivery_date' => '2020-11-01','user_name' => 'Professor1'),
        array('delivery_date' => '2020-12-01','user_name' => 'Professor1'),
        array('delivery_date' => '2021-01-01','user_name' => 'Professor1'),
        array('delivery_date' => '2021-02-01','user_name' => 'Professor1'),
        array('delivery_date' => '2021-03-01','user_name' => 'Professor1'),
        array('delivery_date' => '2021-04-01','user_name' => 'Professor1'),
        array('delivery_date' => '2021-05-01','user_name' => 'Professor1'),
        array('delivery_date' => '2021-06-01','user_name' => 'Professor1'),
        array('delivery_date' => '2021-07-01','user_name' => 'Professor1'),
        array('delivery_date' => '2021-08-01','user_name' => 'Professor1'),
        array('delivery_date' => '2021-09-01','user_name' => 'Professor1'),
        array('delivery_date' => '2021-10-01','user_name' => 'Professor1'),
        array('delivery_date' => '2021-11-01','user_name' => 'Professor1'),
        array('delivery_date' => '2021-12-01','user_name' => 'Professor1'),
        array('delivery_date' => '2022-01-01','user_name' => 'Professor1'),
        array('delivery_date' => '2022-02-01','user_name' => 'Professor1'),
        array('delivery_date' => '2022-03-01','user_name' => 'Professor1'),
        array('delivery_date' => '2022-04-01','user_name' => 'Professor1'),
        array('delivery_date' => '2022-05-01','user_name' => 'Professor1'),
        array('delivery_date' => '2022-06-01','user_name' => 'Professor1'),
        array('delivery_date' => '2022-07-01','user_name' => 'Professor1'),
        array('delivery_date' => '2022-08-01','user_name' => 'Professor1'),
        array('delivery_date' => '2022-09-01','user_name' => 'Professor1'),
        array('delivery_date' => '2022-10-01','user_name' => 'Professor1'),
        array('delivery_date' => '2022-11-01','user_name' => 'Professor1'),
        array('delivery_date' => '2022-12-01','user_name' => 'Professor1'),
        array('delivery_date' => '2020-01-01','user_name' => 'Professor2'),
        array('delivery_date' => '2020-02-01','user_name' => 'Professor2'),
        array('delivery_date' => '2020-03-01','user_name' => 'Professor2'),
        array('delivery_date' => '2020-04-01','user_name' => 'Professor2'),
        array('delivery_date' => '2020-05-01','user_name' => 'Professor2'),
        array('delivery_date' => '2020-06-01','user_name' => 'Professor2'),
        array('delivery_date' => '2020-07-01','user_name' => 'Professor2'),
        array('delivery_date' => '2020-08-01','user_name' => 'Professor2'),
        array('delivery_date' => '2020-09-01','user_name' => 'Professor2'),
        array('delivery_date' => '2020-10-01','user_name' => 'Professor2'),
        array('delivery_date' => '2020-11-01','user_name' => 'Professor2'),
        array('delivery_date' => '2020-12-01','user_name' => 'Professor2'),
        array('delivery_date' => '2021-01-01','user_name' => 'Professor2'),
        array('delivery_date' => '2021-02-01','user_name' => 'Professor2'),
        array('delivery_date' => '2021-03-01','user_name' => 'Professor2'),
        array('delivery_date' => '2021-04-01','user_name' => 'Professor2'),
        array('delivery_date' => '2021-05-01','user_name' => 'Professor2'),
        array('delivery_date' => '2021-06-01','user_name' => 'Professor2'),
        array('delivery_date' => '2021-07-01','user_name' => 'Professor2'),
        array('delivery_date' => '2021-08-01','user_name' => 'Professor2'),
        array('delivery_date' => '2021-09-01','user_name' => 'Professor2'),
        array('delivery_date' => '2021-10-01','user_name' => 'Professor2'),
        array('delivery_date' => '2021-11-01','user_name' => 'Professor2'),
        array('delivery_date' => '2021-12-01','user_name' => 'Professor2'),
        array('delivery_date' => '2022-01-01','user_name' => 'Professor2'),
        array('delivery_date' => '2022-02-01','user_name' => 'Professor2'),
        array('delivery_date' => '2022-03-01','user_name' => 'Professor2'),
        array('delivery_date' => '2022-04-01','user_name' => 'Professor2'),
        array('delivery_date' => '2022-05-01','user_name' => 'Professor2'),
        array('delivery_date' => '2022-06-01','user_name' => 'Professor2'),
        array('delivery_date' => '2022-07-01','user_name' => 'Professor2'),
        array('delivery_date' => '2022-08-01','user_name' => 'Professor2'),
        array('delivery_date' => '2022-09-01','user_name' => 'Professor2'),
        array('delivery_date' => '2022-10-01','user_name' => 'Professor2'),
        array('delivery_date' => '2022-11-01','user_name' => 'Professor2'),
        array('delivery_date' => '2022-12-01','user_name' => 'Professor2'),
        array('delivery_date' => '2020-01-01','user_name' => 'Professor3'),
        array('delivery_date' => '2020-02-01','user_name' => 'Professor3'),
        array('delivery_date' => '2020-03-01','user_name' => 'Professor3'),
        array('delivery_date' => '2020-04-01','user_name' => 'Professor3'),
        array('delivery_date' => '2020-05-01','user_name' => 'Professor3'),
        array('delivery_date' => '2020-06-01','user_name' => 'Professor3'),
        array('delivery_date' => '2020-07-01','user_name' => 'Professor3'),
        array('delivery_date' => '2020-08-01','user_name' => 'Professor3'),
        array('delivery_date' => '2020-09-01','user_name' => 'Professor3'),
        array('delivery_date' => '2020-10-01','user_name' => 'Professor3'),
        array('delivery_date' => '2020-11-01','user_name' => 'Professor3'),
        array('delivery_date' => '2020-12-01','user_name' => 'Professor3'),
        array('delivery_date' => '2021-01-01','user_name' => 'Professor3'),
        array('delivery_date' => '2021-02-01','user_name' => 'Professor3'),
        array('delivery_date' => '2021-03-01','user_name' => 'Professor3'),
        array('delivery_date' => '2021-04-01','user_name' => 'Professor3'),
        array('delivery_date' => '2021-05-01','user_name' => 'Professor3'),
        array('delivery_date' => '2021-06-01','user_name' => 'Professor3'),
        array('delivery_date' => '2021-07-01','user_name' => 'Professor3'),
        array('delivery_date' => '2021-08-01','user_name' => 'Professor3'),
        array('delivery_date' => '2021-09-01','user_name' => 'Professor3'),
        array('delivery_date' => '2021-10-01','user_name' => 'Professor3'),
        array('delivery_date' => '2021-11-01','user_name' => 'Professor3'),
        array('delivery_date' => '2021-12-01','user_name' => 'Professor3'),
        array('delivery_date' => '2022-01-01','user_name' => 'Professor3'),
        array('delivery_date' => '2022-02-01','user_name' => 'Professor3'),
        array('delivery_date' => '2022-03-01','user_name' => 'Professor3'),
        array('delivery_date' => '2022-04-01','user_name' => 'Professor3'),
        array('delivery_date' => '2022-05-01','user_name' => 'Professor3'),
        array('delivery_date' => '2022-06-01','user_name' => 'Professor3'),
        array('delivery_date' => '2022-07-01','user_name' => 'Professor3'),
        array('delivery_date' => '2022-08-01','user_name' => 'Professor3'),
        array('delivery_date' => '2022-09-01','user_name' => 'Professor3'),
        array('delivery_date' => '2022-10-01','user_name' => 'Professor3'),
        array('delivery_date' => '2022-11-01','user_name' => 'Professor3'),
        array('delivery_date' => '2022-12-01','user_name' => 'Professor3'),
    );

    private $arrayUsers = array(
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
        self::seedOrder();
        $this->command->info('Tabla orders inicializada con datos!');
    }

    /**
     *
     * @return void
     */
    private function seedOrder()
    {
        DB::table('orders')->delete();
        /*foreach($this->arrayOrders as $order ) {
            $o = new Order();
            $o->delivery_date = $order['delivery_date'];
            $o->user_name = $order['user_name'];
            $o->save();
        } */

        /* for($i = 0 ; $i < 108 ; $i++) {
            $o = new Order();
            $o->delivery_date = '202'. rand(0,2) . '-' . rand(1,12) . '-' . rand(1,28);
            $o->user_name = 'Professor'. rand(1,3);
            $o->save();
        } */
        for($i = 0 ; $i < 31 ; $i++) {
            $o = new Order();
            $o->delivery_date = Carbon::now()->addDay($i);
            $o->user_name = $this->arrayUsers[rand(0,1)]["name"];
            $o->save();

            $o = new Order();
            $o->delivery_date = Carbon::now()->addDay($i);
            $o->user_name = $this->arrayUsers[rand(2,3)]["name"];
            $o->save();
        }
    }
}
