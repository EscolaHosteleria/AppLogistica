<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Format;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderLine;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth.profeAlum', ['only' => ['teacher_orders']]);
        $this->middleware('auth.adminEcoProfe', ['only' => ['create', 'store', 'exist', 'jsonTableCreate']]);
        $this->middleware('auth.adminEco', ['only' => ['index', 'show', 'edit', 'destroy', 'jsonTableIndex', 'updateOrderAjax']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("comandas.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = Product::all();
        $formats = Format::all();
        $professors_db = DB::table('users')->where('rol_id', DB::table('rols')->where('rol', 'Professorat')->first()->id)->orderBy('name')->get();
        for ($i = 0; $i < count($professors_db); $i++) {
            $professors[$i]['name'] = $professors_db[$i]->name;
        }

        if (isset($_GET["order_id"])) {
            $order = Order::findOrFail($_GET["order_id"]);
            $order->delivery_date = explode(" ", $order->delivery_date)[0];
            return view("comandas.create", ["products" => $products, "professors" => $professors, "formats" => $formats, "order" => $order]);
        }
        return view("comandas.create", ["products" => $products, "professors" => $professors, "formats" => $formats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->order_id != "") {
            $order = Order::findOrFail($request->order_id);
            $created_at = $order->created_at;
            $order->delete();
        }
        $orders = Order::where('user_name', $request->user_name)->where('delivery_date', $request->delivery_date)->get();
        if (!is_null($request->product_name)) {
            if (count($orders) == 0) {
                $o = new Order();
                $o->user_name = $request->user_name;
                $o->delivery_date = date($request->delivery_date);
                if (isset($created_at) && $created_at != "") {
                    $o->id = $request->order_id;
                    $o->created_at = $created_at;
                }
                $o->save();
                $order_id = Order::where('user_name', $request->user_name)->where('delivery_date', $request->delivery_date)->first()->id;
                for ($i = 0; $i < count($request->product_name); $i++) {
                    $ol = new OrderLine();
                    $ol->order_id = $order_id;
                    $ol->product_name = $request->product_name[$i];
                    $ol->category_name = $request->category_name[$i];
                    $ol->quantity = $request->quantity[$i];
                    $ol->format_name = $request->format_name[$i];
                    $ol->observation = $request->observation[$i];
                    $ol->save();
                }
                notify()->success('La comanda s\'ha guardat correctament');
                return redirect()->action('App\Http\Controllers\OrderController@create');
            }
        } else {
            if ($request->order_id == "") {
                notify()->error('Has intentat crear una comanda sense productes.');
            } else {
                notify()->success('La comanda s\'ha eliminat correctament');
            }
            return redirect()->action('App\Http\Controllers\OrderController@create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order_lines = OrderLine::where('order_id', $id)->get();
        foreach ($order_lines as $key => $order_line){
            $order_line->quantity = str_replace(".",",", $order_line->quantity);
        }
        $order = Order::findOrFail($id);

        $delivery_date = Carbon::parse($order->delivery_date)->locale('ca');
        $created_date = Carbon::parse($order->created_at)->locale('ca');

        //dd($created_at);
        $order->delivery_date = $delivery_date;
        $order->created_date = $created_date;

        return view('comandas.show', ['order_lines' => $order_lines, 'order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->action('App\Http\Controllers\OrderController@create', ["order_id" => $id]);
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
        $o = Order::find($id);
        $o->delete();
        notify()->success('La comanda s\'ha eliminat correctament');
        return redirect()->action('App\Http\Controllers\OrderController@index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function exist(Request $request)
    {
        $orders = Order::where('user_name', $request->user_name)->where('delivery_date', $request->delivery_date)->get();
        if (count($orders) != 0) {
            $order_lines = OrderLine::where('order_id', $orders[0]->id)->get();
            header("Content-Type: application/json");
            return json_encode($order_lines);
        }
        return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function teacher_orders(Request $request)
    {
        $dies = ["dilluns", "dimarts", "dimecres", "dijous", "divendres"];
        $dilluns = Carbon::create($request->monday);
        $dimarts = Carbon::create($request->monday)->next('Tuesday');
        $dimecres = Carbon::create($request->monday)->next('Wednesday');
        $dijous = Carbon::create($request->monday)->next('Thursday');
        $divendres = Carbon::create($request->monday)->next('Friday');
        $dia = [$dilluns, $dimarts, $dimecres, $dijous, $divendres];

        for ($i = 0; $i < count($dies); $i++) {
            $order = Order::where('user_name', $request->user_name)->where('delivery_date', $dia[$i])->first();
            $orders[$dies[$i]]['day_for'] = "D" . substr($dies[$i], 1)  . ' ' . $dia[$i]->format('d-m-Y');
            if (!is_null($order)) {
                $orders[$dies[$i]]['order_lines'] =  OrderLine::where('order_id', $order->id)
                    ->orderBy('category_name')
                    ->orderBy('product_name')
                    ->orderBy('format_name')
                    ->get();
            } else {
                $orders[$dies[$i]]['order_lines'] =  "";
            }
        }
        header("Content-Type: application/json");
        return json_encode($orders);
    }

    /**
     * JSON Table Create Comanda
     */
    public function jsonTableCreate(Request $request)
    {

        $products = Product::all();
        $formats = Format::orderBy('name')->get();

        $rows = [];

        foreach ($products as $product) {
            $selectFormat = '<div class="input-group-append">
            <div class="form-group my-0">
                <select class="form-control sel-create">';
            foreach ($formats as $format) {
                $selectFormat .= '<option value ="' . $format->name . '" ';
                if ($format->name == $product->format_name) {
                    $selectFormat .= 'selected';
                }
                $selectFormat .= '>' . $format->name . '</option>';
            }
            $selectFormat .= '</select></div></div></div></div>';
            array_push($rows, [
                "DT_RowId" => $product->id,
                "Nom" => $product->name,
                "Categoría" => $product->category_name,
                "Quantitat" => '<div class="form-group my-0">
                <div class="input-group"><input class="form-control input-quantity" type="number" placeholder="#####,###">' . $selectFormat,
                "Observació" => '<div class="form-group my-0"><input type="text" class="form-control" placeholder="Comentaris..."></div>',
                "Afegir" => '<button type="button" class="add-alimento mx-auto btn btn-success btn-circle" disabled><i class="fa fa-plus"></i></button>'
            ]);
        }

        $table = [
            "total_rows" => count($products),
            "rows" => $rows
        ];

        return ($table);
    }

    /**
     * Funció que dona les dades de la taula en json per carregar ràpid (per ajax)
     *
     * @return void
     */
    public function jsonTableIndex()
    {
        $orders = DB::table('orders')->get();
        foreach ($orders as $key => $order) {
            $delivery_date = Carbon::create($order->delivery_date)->locale('ca');
            $created_at = Carbon::create($order->created_at)->locale('ca');
            //$date = Carbon::parse($order->delivery_date)->locale('ca')->isoFormat('DD MMMM YYYY');
            $order->delivery_date = $delivery_date;
            $order->created_at = $created_at;
        }

        $rows = [];
        foreach ($orders as $order) {
            $actions_col = '<form class="btn-group" id="deleteOrderForm'. $order->id .'" role="group" aria-label="Accions" action="' . action("App\Http\Controllers\OrderController@destroy", $order->id) . '" method="POST">'
                . method_field('DELETE') . ' ' . csrf_field() .
            '<a type="button" href="comanda/' . $order->id . '" class="btn btn-info rounded-left">Mostra</a>
            <button type="button" class="btn btn-danger deleteOrder" data-toggle="modal" data-target="#deleteOrderModal">Eliminar</button>
            </form>';

            $comprovat = '<div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="order-'.$order->id.'"';

            if ($order->checked_order) {
                $comprovat .= ' checked';
            }
                $comprovat .= '>
                <label class="custom-control-label" for="order-'.$order->id.'"></label>
                </div>';

            array_push($rows, [
                "Comprovada" => $comprovat,
                "ID" => $order->id,
                "Data creació" => $order->created_at->isoFormat('DD/MM/YYYY'),
                "Data entrega" => $order->delivery_date->isoFormat('DD/MM/YYYY'),
                "Usuari" => $order->user_name,
                "Entregat" => $order->received_order == 0 ? 'No <i class="fas fa-times" style="color:red"></i>' : 'Si <i class="fas fa-check" style="color:green"></i>',
                "Accions" =>  $actions_col
            ]);
        }
        $table = [
            "rows" => $rows
        ];
        return ($table);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateOrderAjax(Request $request)
    {
        //
        //cambio a true/false del order line
        $orderLine = Order::findOrFail($request->id);
        $orderLine->checked_order = $request->checked;
        $orderLine->save();
        return;
    }
}
