@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center my-3">
    <div class="col-xs-12 col-md-10">
        <div class="row mb-3">
            <div class="col-12">
                <h1 class="border-bottom border-primary">
                    <i class="fas fa-tags mr-2 h4"></i>Usuaris
                    <a type="button" href="usuari/create" class="btn btn-success float-right">
                        <i class="fas fa-plus mr-2"></i>Afegir
                    </a>
                </h1>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover mt-3" id="index_users_table">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Correu</th>
                    <th>Rol</th>
                    <th>Creat</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@stop
