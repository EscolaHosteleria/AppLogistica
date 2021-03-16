@extends('layouts.app')

@section('content')
<div class="row px-5">
    <div class="col-12">
        <div class="row d-md-flex justify-content-md-between">
            <div class="col-12 py-3">
                <h1 class="border-bottom border-primary">
                    <i class="fas fa-calendar-alt mr-2 h4"></i>Comandes setmanals
                </h1>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-4">
                <select id="week" name="week" class="form-control-sm custom-select px-1">
                    @foreach ($weeks as $week)
                    <option value="{{$week['monday']}}"> {{$week['week']}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-6 col-md-4 d-flex justify-content-end">
                @php $userRol = Auth::user()->rol->rol; @endphp
                @if ($userRol != 'Professorat')
                <label for="professor" class="align-self-center mb-0 mr-2">Professor: </label>
                <select id="professor" name="professor" class="form-control-sm custom-select px-1">
                    @foreach ($professors as $professor)
                    <option value="{{$professor['name']}}">{{$professor['name']}}</option>
                    @endforeach
                </select>
                @else
                <input id="professor" type="hidden" value="{{Auth::user()->name}}">
                @endif
                <button type="button" id="printIndex" class="btn btn-info ml-2"><i class="fa fa-print fa-lg" aria-hidden="true"></i></button>
            </div>
        </div>
        <div class="row mt-4 mx-0 px-2 py-3 bg-white">
            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs row no-gutters" id="nav-tab" role="tablist">
                        <a class="nav-link col text-center active" id="nav-dilluns-tab" data-toggle="tab" href="#nav-dilluns" role="tab" aria-controls="nav-dilluns" aria-selected="true">Dilluns</a>
                        <a class="nav-link col text-center" id="nav-dimarts-tab" data-toggle="tab" href="#nav-dimarts" role="tab" aria-controls="nav-dimarts" aria-selected="false">Dimarts</a>
                        <a class="nav-link col text-center" id="nav-dimecres-tab" data-toggle="tab" href="#nav-dimecres" role="tab" aria-controls="nav-dimecres" aria-selected="false">Dimecres</a>
                        <a class="nav-link col text-center" id="nav-dijous-tab" data-toggle="tab" href="#nav-dijous" role="tab" aria-controls="nav-dijous" aria-selected="false">Dijous</a>
                        <a class="nav-link col text-center" id="nav-divendres-tab" data-toggle="tab" href="#nav-divendres" role="tab" aria-controls="nav-divendres" aria-selected="false">Divendres</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-dilluns" role="tabpanel" aria-labelledby="nav-dilluns-tab">...</div>
                    <div class="tab-pane fade" id="nav-dimarts" role="tabpanel" aria-labelledby="nav-dimarts-tab">...</div>
                    <div class="tab-pane fade" id="nav-dimecres" role="tabpanel" aria-labelledby="nav-dimecres-tab">...</div>
                    <div class="tab-pane fade" id="nav-dijous" role="tabpanel" aria-labelledby="nav-dijous-tab">...</div>
                    <div class="tab-pane fade" id="nav-divendres" role="tabpanel" aria-labelledby="nav-divendres-tab">...</div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
