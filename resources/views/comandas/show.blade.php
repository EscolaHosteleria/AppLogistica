@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header text-center bg-primary text-light d-flex">
                <div class="col-10 align-self-center">
                    Comanda nº {{$order->id}} feta el dia <b>{{$order->created_date->isoFormat('DD MMMM YYYY')}}
                    </b> pel dia <b>{{$order->delivery_date->isoFormat('DD MMMM YYYY')}}</b> feta per <b> {{ $order->user_name}}</b>
                </div>
                <div class="col-2 align-self-center">
                    <a type="button" href="/comanda/{{$order->id}}/edit" class="btn btn-warning float-right">Editar</a>
                </div>
            </div>
            <div class="card-body" style="padding:30px">

                <table id="show-table" class="table table-striped table-bordered mt-3">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Entregat</th>
                            <th>Línea</th>
                            <th>Nom</th>
                            <th>Categoria</th>
                            <th>Quantitat</th>
                            <th>Format</th>
                            <th>Observació</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $order_lines as $key => $order_line )
                        <tr>
                            @if ($order_line->received_product)
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="orderLine-{{$order_line->id}}" checked>
                                    <label class="custom-control-label" for="orderLine-{{$order_line->id}}"></label>
                                </div>
                            </td>
                            @else
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="orderLine-{{$order_line->id}}">
                                    <label class="custom-control-label" for="orderLine-{{$order_line->id}}"></label>
                                </div>
                            </td>
                            @endif
                            <td>{{$order_line->id}}</td>
                            <td>{{$order_line->product_name}}</td>
                            <td>{{$order_line->category_name}}</td>
                            <td>{{$order_line->quantity}}</td>
                            <td>{{$order_line->format_name}}</td>
                            <td>{{$order_line->observation}}</td>
                            @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@stop
