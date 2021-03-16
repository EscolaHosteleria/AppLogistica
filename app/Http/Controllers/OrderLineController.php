<?php

namespace App\Http\Controllers;

use App\Models\OrderLine;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderLineController extends Controller
{
    public function __construct() {
        $this->middleware('auth.adminEco');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        //
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        //
    }*/

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
    /*public function show($id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        //
    }*/

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateOrderLineAjax(Request $request)
    {
        //
        //cambio a true/false del order line
        $orderLine = OrderLine::findOrFail($request->id);
        $orderLine->received_product = $request->received;
        $orderLine->save();

        //comprovación de productos entregados
        $orderLineCount = OrderLine::where('order_id', $orderLine->order_id)->get()->count();
        $orderLineReceivedCount = OrderLine::where('order_id', $orderLine->order_id)->where('received_product', 1)->get()->count();
        //si todos los productos de este pedido están entregados se cambia el valor del order
        $order = Order::findOrFail($orderLine->order_id);
        if( $orderLineCount == $orderLineReceivedCount ){
            $order->received_order = 1;
        }else{
            $order->received_order = 0;
        }
        $order->save();
        return;
    }
}
