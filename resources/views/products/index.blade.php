@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center my-3">
    <div class="col-xs-12 col-md-10">
        <div class="row mb-3">
            <div class="col-12">
                <h1 class="border-bottom border-primary">
                    <i class="fas fa-apple-alt mr-2 h4"></i>Productes
                    <a type="button" href="producte/create" class="btn btn-success float-right">
                        <i class="fas fa-plus mr-2"></i>Afegir
                    </a>
                </h1>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover mt-3" id="index_products_table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Estoc</th>
                    <th>Categoría</th>
                    <th>Format</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@stop
