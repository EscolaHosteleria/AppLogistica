@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        @if (isset($alert['categoria']))
        <div class="col-12 alert alert-warning" role="alert">{{$alert['categoria']}}</div>
        @endif
        @if (isset($alert['format']))
        <div class="col-12 alert alert-warning" role="alert">{{$alert['format']}}</div>
        @endif
        <div class="card">
            <div class="card-header text-center bg-primary text-light">
                <h4><i class="fas fa-edit mr-2 h6"></i>Editar producte</h4>
            </div>

            <div class="card-body" style="padding:30px">

                {{-- TODO: Abrir el formulario e indicar el método POST --}}

                <form action="{{action('App\Http\Controllers\ProductController@update', $product->id)}}" method="post">
                    {{method_field('PUT')}}
                    {{ csrf_field() }}

                    {{-- TODO: Protección contra CSRF --}}

                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$product->name}}">
                        @error('name')<div class="invalid-feedback">Camp obligatori</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="quantity">Estoc</label>
                        <input type="text" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{$product->quantity}}">
                        @error('quantity')<div class="invalid-feedback">Camp obligatori</div>@enderror
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="category_name">Categories:</label>
                            <select name="category_name" class="form-control" id="category_name">
                                <option selected value="{{$product->category_name}}">{{$product->category_name}}</option>
                                @foreach($categories as $key => $category)
                                @if ($product->category_name != $category->name)
                                <option value="{{$category->name}}">{{$category->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="format_name">Format:</label>
                            <select name="format_name" class="form-control" id="format_name">
                                <option selected value="{{$product->format_name}}">{{$product->format_name}}</option>
                                @foreach($formats as $key => $format)
                                @if ($product->format_name != $format->name)
                                <option value="{{$format->name}}">{{$format->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" style="padding:8px 20px;margin-top:25px;">
                            Desar producte
                        </button>
                        <a href="/producte" type="submit" class="btn btn-danger" style="padding:8px 20px;margin-top:25px;">
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
