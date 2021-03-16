@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center my-3">
    <div class="col-xs-12 col-md-8 col-lg-6">
        <div class="row mb-3">
            <div class="col-12">
                <h1 class="border-bottom border-primary">
                    <i class="fas fa-shapes mr-2 h4"></i>Formats
                    <a type="button" href="/format/create" class="btn btn-success float-right">
                        <i class="fas fa-plus mr-2"></i>Afegir
                    </a>
                </h1>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover mt-3" id="index_formats_table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
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
