@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center my-3">
    <div class="col-xs-12 col-md-8 col-lg-6">
        <div class="row mb-3">
            <div class="col-12">
                <h1 class="border-bottom border-primary">
                    <i class="fas fa-tags mr-2 h4"></i>Categories
                    <a type="button" href="categoria/create" class="btn btn-success float-right">
                        <i class="fas fa-plus mr-2"></i>Afegir
                    </a>
                </h1>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover mt-3" id="index_categories_table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@stop
