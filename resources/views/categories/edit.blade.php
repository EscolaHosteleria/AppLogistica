@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-center bg-primary text-light">
                <h4><i class="fas fa-edit mr-2 h6"></i>Editar categoria</h4>
            </div>
            <div class="card-body" style="padding:30px">

                <form method="post" action="{{action('App\Http\Controllers\CategoryController@update', $category->id)}}">
                    {{method_field('PUT')}}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}">
                        @error('name')<div class="invalid-feedback">Has d'introduïr un nom</div>@enderror
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" style="padding:8px 20px;margin-top:25px;">
                            Desar categoria
                        </button>
                        <a href="/categoria" type="submit" class="btn btn-danger" style="padding:8px 20px;margin-top:25px;">
                            Cancel·lar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@stop
