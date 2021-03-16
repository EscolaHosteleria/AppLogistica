@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center bg-primary text-light">
                    <h4><i class="fas fa-plus mr-2 h6"></i>Afegir nou usuari</h4>
                </div>
                <div class="card-body" style="padding:30px">

                    {{-- TODO: Abrir el formulario e indicar el método POST --}}

                    <form action="{{action('App\Http\Controllers\UserController@store')}}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                            @error('name')<div class="invalid-feedback">Camp obligatori</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Correu</label>
                            <input name="email" id="email" class="form-control @error('email') is-invalid @enderror" rows="3" value="{{old('email')}}">
                            @error('email')<div class="invalid-feedback">Camp obligatori</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Contrassenya</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" rows="3">
                            @error('password')<div class="invalid-feedback">Camp obligatori</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="rol_id">Rol:</label>
                            <select name="rol_id" class="form-control" id="rol_id">
                                @foreach($rols as $key => $rol)
                                    <option value="{{$rol->id}}">{{$rol->rol}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 20px;margin-top:25px;">
                                Desar usuari
                            </button>
                            <a href="/usuari" type="submit" class="btn btn-danger" style="padding:8px 20px;margin-top:25px;">
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
