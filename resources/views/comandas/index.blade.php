@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center my-3">
    <div class="col-xs-12 col-md-10 ">
        <div class="row mb-3">
            <div class="col-12">
                <h1 class="border-bottom border-primary">
                    <i class="fas fa-tasks mr-2 h4"></i>Comandes fetas
                    <a type="button" class="btn btn-success float-sm-right" href="/comanda/create">
                        <i class="fas fa-plus mr-2"></i>Afegir
                    </a>
                </h1>
            </div>
        </div>
        <table class="mt-3 table table-bordered table-striped" id="index_orders_table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Comprobada</th>
                    <th>Lliurada</th>
                    <th>Data creació</th>
                    <th>Data lliurament</th>
                    <th>Usuari</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div class="modal fade" id="deleteOrderModal" tabindex="-1" role="dialog" aria-labelledby="deleteOrderModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Estàs segur que vols eliminar la comanda?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel·lar</button>
                        <button id="deleteComanda" type="button" class="btn btn-success">Eliminar comanda</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop