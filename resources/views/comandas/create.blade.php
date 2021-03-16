@extends('layouts.app')

@section('content')

<div class="row mx-auto my-3">
    <div class="col-12">
        @if (isset($order))
        <h1 class="border-bottom border-primary">
            <i class="fas fa-edit mr-2 h4"></i>Editar comanda
        </h1>
        @else
        <h1 class="border-bottom border-primary">
            <i class="fas fa-plus mr-2 h4"></i>Crear comanda
        </h1>
        @endif
    </div>
    <div class="col-12">
        <div class="col-xs-12 col-lg-8 listado_items">
            <div class="row justify-content-between pt-3">
                <div class="col-xs-12 col-md-9 col-lg-6">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Data de lliurament</span>
                            </div>
                            @if (isset($order))
                            <input type="date" name="delivery_date" id="orderDate" class="form-control" min="2021-02-01" value="{{$order->delivery_date}}" disabled>
                            @else
                            <input type="date" name="delivery_date" id="orderDate" class="form-control" min="2021-02-01">
                            @endif
                            <div class="modal fade" id="dateModal" tabindex="-1" role="dialog" aria-labelledby="dateModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="dateModalLabel">Alerta!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Estàs a punt de canviar la data d'entrega sense desar la comanda.
                                        </div>
                                        <div class="modal-footer">
                                            <button id="dateChangeCancel" type="button" class="btn btn-danger" data-dismiss="modal">Cancel·lar</button>
                                            <button id="dateChangeConfirm" type="button" class="btn btn-primary">Continuar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="output"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3">
                    @php $userRol = Auth::user()->rol->rol; @endphp
                    @if ($userRol == 'Administrador' || $userRol == 'Economat')
                    @if (isset($order))
                    <select id="professor" class="form-control-sm custom-select px-1" disabled>
                        <option value="{{$order->user_name}}">{{$order->user_name}}</option>
                    </select>
                    @else
                    <select id="professor" class="form-control-sm custom-select px-1">
                        @foreach ($professors as $professor)
                        <option value="{{$professor['name']}}">{{$professor['name']}}</option>
                        @endforeach
                    </select>
                    @endif

                    @else
                    <input id="professor" type="hidden" value="{{Auth::user()->name}}">
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-lg-8 listado_items">
        <div class="row">
            <div class="col-12 tabla_items">
                <table class="table table-bordered table-striped " id="create_comanda_table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nom</th>
                            <th>Categoria</th>
                            <th>Quantitat</th>
                            <th>Observació</th>
                            <th>Afegir</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-lg-4">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center">Llistat</h3>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <form id="formAddComanda" method="post" class="w-100 row carrito_row" action="{{action('App\Http\Controllers\OrderController@store')}}">
                    <div id="carrito_table_cont">
                        <table class="table table-bordered table-striped col-12" id="carrito_table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>
                                        <button type="button" class="btn btn-sm p-1" data-toggle="tooltip" data-placement="right" title="Comentaris">
                                            <i class="fas fa-file-alt fa-lg"></i>
                                        </button>
                                    </th>
                                    <th>Nom</th>
                                    <th>Quantitat</th>
                                    <th>Format</th>
                                    <th>
                                        <div class="mx-auto btn btn-danger btn-circle"><i class="fa fa-minus"></i></div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="carrito">
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 mt-3">
                        {{ csrf_field() }}
                        {{-- TODO: Protección contra CSRF --}}
                        <input type="hidden" name="delivery_date" id="orderDatePOST">
                        <input type="hidden" name="order_id" id="order_id">
                        <input type="hidden" name="user_name" id="user_name">
                        <!-- Modal -->
                        <div class="modal fade" id="saveOrderModal" tabindex="-1" role="dialog" aria-labelledby="saveOrderModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Estàs segur que vols desar la comanda?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="#tableCarritoModal" class="table table-bordered table-striped col-12"></table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel·lar</button>
                                        <button id="sendFormComanda" type="button" class="btn btn-success">Desar comanda</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="saveOrder" type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#saveOrderModal" disabled>Desa la comanda</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop