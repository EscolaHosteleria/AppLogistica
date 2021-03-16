@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center my-3">
        <div class="col-sm-12 col-md-12 col-lg-10">
            <h1 class="border-bottom border-primary"><i class="fas fa-list-ol mr-2 h4"></i>Informes</h1>
            <div class="row align-items-end py-3">
                <div class="col-2 pr-0">
                    <label for="year">Any</label>
                    <select id="year" name="year" class="form-control-sm custom-select px-1">
                        <option value="">Selecciona un any...</option>
                        @foreach ($years as $year)
                            <option {{\Carbon\Carbon::now()->setTimeZone("Europe/Madrid")->format('Y') == $year ? " selected" : ""}} value="{{$year}}">{{$year}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2 pr-0">
                    <label for="month">Mes</label>
                    <select id="month" name="month" class="form-control-sm custom-select px-1"></select>
                </div>
                <div class="col-3 pr-0">
                    <label for="date">Data de lliurament</label>
                    <select id="date" name="date" class="form-control-sm custom-select px-1"></select>
                </div>
                <div class="col-3 pr-0">
                    <label for="professor">Professors</label>
                    <select id="professor" name="professor" class="form-control-sm custom-select px-1">
                        <option value="">Tots</option>
                    </select>
                </div>
                <div class="col-2 text-right">
                    <button title="Filtrar" id="filtro" type="button" class="btn btn-info">{{--Filtrar --}}<i class="fas fa-search"></i></button>
                    <button title="Imprimir" id="printReport" type="button" class="btn btn-info"><i class="fa fa-print fa-lg" aria-hidden="true"></i></button>
                </div>
            </div>
            <div id="preImprimir">
                <div id="cabecera" class="d-none row"></div>
                <table class="table table-striped table-bordered table-fixed mt-3">
                    <thead class="bg-dark text-white">
                    <tr>
                        <th>ID</th>
                        <th>Categoria</th>
                        <th>Producte</th>
                        <th>Quantitat</th>
                        <th>Format</th>
                        <th>Observació</th>
                        <th>Professor</th>
                        <th>Lliurament</th>
                    </tr>
                    </thead>
                    <tbody id="informe"></tbody>
                </table>
            </div>

        </div>

    </div>
@stop
