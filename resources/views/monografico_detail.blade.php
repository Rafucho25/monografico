@extends('layout')
<title>Detalle monografico</title>

@section('header')
    <link rel="stylesheet" href="{{asset('css/search.css')}}">
@endsection

@section('body')
<br>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card border-primary text-center">
            <div class="card-header">
                <h3>Detalles Del Monografico</h3>
            </div>
            <div class="card-body text-primary">
                <h4 class="card-title">{{$monografico->nombre_universidad}}</h4>
                <h4 class="card-title">Recinto {{$monografico->nombre_recinto}}</h4>
                <br>
                <h5 class="card-text">{{$monografico->nombre_facultad}}</h5>
                <h5 class="card-text">Escuela de {{$monografico->nombre_escuela}}</h5>
                <br>
                <h6 class="card-text">Titulo Universitario {{$monografico->titulo_universitario}} </h6>
                <h6 class="card-text">Tema {{$monografico->tema}}</h6>
                <h6 class="card-text">{{$fecha}}</h6>                
            </div>
            <div class="card-footer text-muted">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Autor/es</h5>
                        <ul class="list-group">
                            @foreach ($autores as $autor)
                                <li class="list-group-item">{{$autor->nombres . ' ' . $autor->apellidos . ' ' . $autor->matricula}}</li>
                            @endforeach
                          </ul>
                    </div>
                    <div class="col-md-6">
                        <h5>Sustentante/s</h5>
                        <ul class="list-group">
                            @foreach ($sustentantes as $sus)
                                <li class="list-group-item">{{$sus->nombres . ' ' . $sus->apellidos}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection