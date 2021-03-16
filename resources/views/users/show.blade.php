@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-9">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4 p-4 align-self-center">
                    <img class="rounded img-thumbnail mx-auto" src="{{ asset('images/olivar-gran-thumb.png') }}" alt="{{$user->name}}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title border-bottom border-primary">{{$user->name}}</h2>
                        <p class="card-text"><b>Correu:</b> {{$user->email}}</p>
                        <p class="card-text"><b>Rol:</b> {{$user->rol}}</p>

                        <form class="btn-group align-self-end" role="group" aria-label="Accions" action="{{action('App\Http\Controllers\UserController@destroy', $user->id)}}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <a href="/usuari/{{$user->id}}/edit/" class="btn btn-warning rounded-left">Editar</a>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            <a href="/usuari" class="btn btn-default btn-outline-dark"><i class="fa fa-chevron-left" aria-hidden="true"></i> Tornar al llistat</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
