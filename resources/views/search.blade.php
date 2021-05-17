@extends('layout')
<title>Resultado de busqueda</title>

@section('header')
    <link rel="stylesheet" href="{{asset('css/search.css')}}">
@endsection

@section('body')
<br>
<div class="row">
    @if ($list->count() == 0)
    <div class="alert alert-danger" role="alert">
        No existen monograficos con este criterio de busqueda. Favor tratar con otros criterios
      </div>
    @endif
    @foreach ($list as $data)
        <div class="col-md-5 zoom" style="margin-top: 20px">
            <div class="card  card-monografico">
                <div class="card-body">
                <h5 class="card-title">Tema: {{$data->tema}}</h5>
                <p class="card-text"> <strong>Universidad: </strong> {{$data->nombre_universidad}}</p>
                <p class="card-text"> <strong>Facultad: </strong> {{$data->nombre_facultad}}</p>
                <p class="card-text"> <strong>Escuela: </strong> {{$data->nombre_escuela}}</p>
                <a href="{{route('monografico_show', $data->id)}}" class="btn btn-primary">Ver detalles</a>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    @endforeach
    <div class="row" style="margin-top: 20px">
        {{ $list->appends(array('filter' => $filter, 'text' => $text))->render() }}
    </div>
</div>
@endsection