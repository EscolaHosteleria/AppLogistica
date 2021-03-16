<?php

namespace App\Http\Controllers;

use App\Models\Format;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct() {
        $this->middleware('auth.adminEcoAlum');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_lines = DB::table('orders')
            ->join('order_lines', 'orders.id', '=', 'order_lines.order_id')
            ->select('order_lines.*', 'orders.delivery_date')->get();

        $orders = DB::table('orders')
            ->orderBy('delivery_date')->get();

        $years = [];
        for ($i = 0 ; $i < count($orders); $i++) {
            $years[$i] = Carbon::parse($orders[$i]->delivery_date)->setTimezone('Europe/Madrid')->isoFormat('Y');
        }

        return view('informes.index', ['order_lines' => $order_lines,
            "years" => array_unique($years)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $formats = DB::table('formats')->get();
        $professors_db = DB::table('users')
            ->where('rol_id', DB::table('rols')
            ->where('rol','Professorat')
                ->first()->id)->get();
        for($i = 0 ; $i < count($professors_db); $i++){
            $professors[$i]['name'] = $professors_db[$i]->name;
        }

        foreach ($products as $key => $product){
            $product->category = Category::findOrFail($product->category_id)->name;
            $product->format = Format::findOrFail($product->format_id)->name;
        }

        if(isset($_GET["order_id"])){
            $order = Order::findOrFail($_GET["order_id"]);
            $order->delivery_date = explode(" " ,$order->delivery_date)[0];
            return view("informes.create", ["products" => $products, "professors" => $professors, "formats" => $formats, "order" => $order]);
        }
        return view("informes.create", ["products" => $products, "professors" => $professors, "formats" => $formats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Cargar los select de año, mes, día y nombre de profesor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function selects(Request $request)
    {
        $delivery_date = "";

        /* select de los meses */
        if($request->selectId == 'month'){
            $delivery_date = $request->delivery_date . "-01-01";

            $ordersOfYear = DB::table('orders')
                ->where('delivery_date', '>=', Carbon::create($delivery_date)->startOfYear())
                ->where('delivery_date', '<=', Carbon::create($delivery_date)->endOfYear())
                ->orderBy('delivery_date')->get();

            $months = [];
            for ($i = 0 ; $i < count($ordersOfYear); $i++) {
                $months[$i] = Carbon::parse($ordersOfYear[$i]->delivery_date)->isoFormat('MMMM');
            }

            /* Array de todos los meses con comanda y el mes actual */
            $arrayMonths = [
                array_unique($months),
                Carbon::now()->utcOffset(60)->isoFormat('MMMM')
            ];

            header("Content-Type: application/json");
            return json_encode($arrayMonths);
        }

        /* select de las fechas */
        if($request->selectId == 'date'){
            $delivery_date = $request->delivery_date . "-01";

            $ordersOfMonth = DB::table('orders')
                ->where('delivery_date', '>=', Carbon::create($delivery_date)->startOfMonth())
                ->where('delivery_date', '<=', Carbon::create($delivery_date)->endOfMonth())
                ->orderBy('delivery_date')->get();

            $dates = [];
            $datesInNumber = [];
            for ($i = 0 ; $i < count($ordersOfMonth); $i++) {
                $dates[$i] = Carbon::parse($ordersOfMonth[$i]->delivery_date)->isoFormat('DD-MMMM-Y');
                $datesInNumber[$i] = $ordersOfMonth[$i]->delivery_date;
            }

            /* Array de todos los días con comanda y el día actual */
            $arrayDates = [
                array_unique($dates),
                array_unique($datesInNumber),
                Carbon::now()->setTimeZone("Europe/Madrid")->isoFormat('DD-MMMM-Y')
            ];

            header("Content-Type: application/json");
            return json_encode($arrayDates);
        }

        /* select de los profesores */
        if($request->selectId == 'professor'){

            if ($request->delivery_date == "") {
                $ordersOfMonth = DB::table('orders')
                    ->where('delivery_date', '>=', Carbon::create($request->delivery_month)->startOfMonth())
                    ->where('delivery_date', '<=', Carbon::create($request->delivery_month)->endOfMonth())
                    ->orderBy('delivery_date')->get();
                if ($request->yearOnly == "true") {
                    $ordersOfMonth = DB::table('orders')
                        ->where('delivery_date', '>=', Carbon::create($request->delivery_month)->startOfYear())
                        ->where('delivery_date', '<=', Carbon::create($request->delivery_month)->endOfYear())
                        ->orderBy('delivery_date')->get();
                }
            } else {
                $ordersOfMonth = DB::table('orders')
                    ->where('delivery_date', '=', $request->delivery_date)
                    ->orderBy('delivery_date')->get();
            }

            $professors = [];
            for ($i = 0 ; $i < count($ordersOfMonth); $i++) {
                $professors[$i] = $ordersOfMonth[$i]->user_name;
            }

            header("Content-Type: application/json");
            return json_encode(array_unique($professors));
        }
    }


    /**
     * Cargar los resultados de la comanda según la fecha de entrega y el profesor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function teacherOrders(Request $request)
    {
        $order_lines = "";
        $lliurament = "";

        // Si se consulta por fecha y por un usuario
        if ((isset($request->user_name) && $request->user_name != "") &&
            (isset($request->delivery_date) && $request->delivery_date != "")) {
            $order = Order::where('user_name', $request->user_name)->where('delivery_date', $request->delivery_date)->get();
            $order_lines = [];
            $lliurament = Carbon::parse($request->delivery_date)->isoFormat('DD/MM/YYYY');
            for ($i = 0; $i < count($order); $i++) {
                $orderLines = OrderLine::where('order_id', $order[$i]->id)->get();
                for ($j = 0; $j < count($orderLines); $j++) {
                    $order_lines[$i][$j] = [$orderLines[$j], $request->user_name, $lliurament];
                }
            }
        }

        // Si se consulta por fecha y para todos los usuario
        if ((!isset($request->user_name) && $request->user_name == "") &&
            (isset($request->delivery_date) && $request->delivery_date != "")) {
            $order = Order::where('delivery_date', $request->delivery_date)->get();
            $order_lines = [];
            $lliurament = Carbon::parse($request->delivery_date)->isoFormat('DD/MM/YYYY');
            for ($i = 0; $i < count($order); $i++) {
                $orderLines = OrderLine::where('order_id', $order[$i]->id)->get();
                for ($j = 0; $j < count($orderLines); $j++) {
                    $order_lines[$i][$j] = [$orderLines[$j], $order[$i]->user_name, $lliurament];
                }
            }
        }

        // Si se consulta para un mes y un usuario
        if ((isset($request->user_name) && $request->user_name != "") &&
            (!isset($request->delivery_date) && $request->delivery_date == "") &&
            (isset($request->delivery_month) && $request->delivery_month != "") &&
            (!isset($request->yearOnly) && $request->yearOnly == "false")) {
            $order = Order::where('delivery_date', $request->delivery_date)->first();
            $order_lines = [];
            for ($i = 0; $i < count($order); $i++) {
                $lliurament = Carbon::create($order[$i]->delivery_date)->isoFormat('DD/MM/YYYY');
                $orderLines = OrderLine::where('order_id', $order[$i]->id)->get();
                for ($j = 0; $j < count($orderLines); $j++) {
                    $order_lines[$i][$j] = [$orderLines[$j], $request->user_name, $lliurament];
                }
            }
        }

        // Si se consulta por el año solo o por el año y mes
        if ((!isset($request->user_name) && $request->user_name == "") &&
            (!isset($request->delivery_date) && $request->delivery_date == "") &&
            (isset($request->delivery_month) && $request->delivery_month != "")) {
            if ($request->yearOnly == "true") {
                $order = Order::where('delivery_date', '>=', Carbon::create($request->delivery_month)->startOfYear())
                    ->where('delivery_date', '<=', Carbon::create($request->delivery_month)->endOfYear())
                    ->orderBy('delivery_date')->get();
            }
            if ($request->yearOnly == "false") {
                $order = Order::where('delivery_date', '>=', Carbon::create($request->delivery_month)->startOfMonth())
                    ->where('delivery_date', '<=', Carbon::create($request->delivery_month)->endOfMonth())
                    ->orderBy('delivery_date')->get();
            }
            $order_lines = [];
            for ($i = 0; $i < count($order); $i++) {
                $lliurament = Carbon::create($order[$i]->delivery_date)->isoFormat('DD/MM/YYYY');
                $orderLines = OrderLine::where('order_id', $order[$i]->id)->get();
                for ($j = 0; $j < count($orderLines); $j++) {
                    $order_lines[$i][$j] = [$orderLines[$j], $order[$i]->user_name, $lliurament];
                }
            }
        }

        // Si se consulta por el año solo y por un profesor concreto
        if ((isset($request->user_name) && $request->user_name != "") &&
            (!isset($request->delivery_date) && $request->delivery_date == "") &&
            (isset($request->delivery_month) && $request->delivery_month != "")) {
            if ($request->yearOnly == "true") {
                $order = Order::where('delivery_date', '>=', Carbon::create($request->delivery_month)->startOfYear())
                    ->where('delivery_date', '<=', Carbon::create($request->delivery_month)->endOfYear())
                    ->where('user_name', $request->user_name)
                    ->orderBy('delivery_date')->get();
            }
            if ($request->yearOnly == "false") {
                $order = Order::where('delivery_date', '>=', Carbon::create($request->delivery_month)->startOfMonth())
                    ->where('delivery_date', '<=', Carbon::create($request->delivery_month)->endOfMonth())
                    ->where('user_name', $request->user_name)
                    ->orderBy('delivery_date')->get();
            }
            $order_lines = [];
            for ($i = 0; $i < count($order); $i++) {
                $lliurament = Carbon::create($order[$i]->delivery_date)->isoFormat('DD/MM/YYYY');
                $orderLines = OrderLine::where('order_id', $order[$i]->id)->get();
                for ($j = 0; $j < count($orderLines); $j++) {
                    $order_lines[$i][$j] = [$orderLines[$j], $request->user_name, $lliurament];
                }
            }
        }

        header("Content-Type: application/json");
        return json_encode($order_lines);
    }
}
