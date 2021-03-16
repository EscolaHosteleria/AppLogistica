@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-center bg-primary text-light">
                <h4><i class="fas fa-plus mr-2 h6"></i>Afegir nou format</h4>
            </div>
            <div class="card-body" style="padding:30px">

                {{-- TODO: Abrir el formulario e indicar el método POST --}}

                <form action="{{action('App\Http\Controllers\FormatController@store')}}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title">Nom</label>
                        <input type="text" name="name" id="title" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                        @error('name')<div class="invalid-feedback">Camp obligatori</div>@enderror
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" style="padding:8px 20px;margin-top:25px;">
                            Desar formato
                        </button>
                        <a href="/format" type="submit" class="btn btn-danger" style="padding:8px 20px;margin-top:25px;">
                            Cancel·lar
                        </a>
                    </div>

                </form>

                {{-- TODO: Cerrar formulario --}}

            </div>
        </div>
    </div>
</div>
@stop
