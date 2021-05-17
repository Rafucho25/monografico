@extends('user.layout')
<title>Sistema de Monograficos</title>

@section('header')
    
<style>

    .zoom {
        transition: transform .2s; /* Animation */
    }
    
    .zoom:hover {
        transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
</style>
@endsection

@section('body')
<div class="row">
    <div class="col-md-10">
        <h2>Bienvenido al Sistema de Monograficos</h2>
    </div>
</div> <br>
<div class="row">
    <div class="col-sm-3 zoom">
        <div class="card text-white bg-primary mb-4" style="max-width: 18rem;">
            <div class="card-body">
              <center><h5 class="card-title">Cantidad de Universidades</h5></center>
              <center><p class="card-text"><h1>{{$cantidadUniversidades}}</h1></p></center>
            </div>
        </div>
    </div>
    <div class="col-sm-3 zoom">
        <div class="card text-white bg-success mb-4" style="max-width: 18rem;">
            <div class="card-body">
              <center><h5 class="card-title">Cantidad de Recintos</h5></center>
              <center><p class="card-text"><h1>{{$cantidadRecintos}}</h1></p></center>
            </div>
        </div>
    </div>
    <div class="col-sm-3 zoom">
        <div class="card text-white bg-danger mb-4" style="max-width: 18rem;">
            <div class="card-body">
              <center><h5 class="card-title">Cantidad de Facultades</h5></center>
              <center><p class="card-text"><h1>{{$cantidadFacultades}}</h1></p></center>
            </div>
        </div>
    </div>
    <div class="col-sm-3 zoom">
        <div class="card text-white bg-info mb-4" style="max-width: 18rem;">
            <div class="card-body">
              <center><h5 class="card-title">Cantidad de Escuelas</h5></center>
              <center><p class="card-text"><h1>{{$cantidadEscuelas}}</h1></p></center>
            </div>
        </div>
    </div>
</div>
    <br> <br>
<div class="row">
    <div class="col-sm-3 zoom">
        <div class="card text-white bg-primary mb-4" style="max-width: 18rem;">
            <div class="card-body">
              <center><h5 class="card-title">Cantidad de Carreras</h5></center>
              <center><p class="card-text"><h1>{{$cantidadCarreras}}</h1></p></center>
            </div>
        </div>
    </div>
    <div class="col-sm-3 zoom">
        <div class="card text-white bg-success mb-4" style="max-width: 18rem;">
            <div class="card-body">
              <center><h5 class="card-title">Cantidad de Autores</h5></center>
              <center><p class="card-text"><h1>{{$cantidadAutores}}</h1></p></center>
            </div>
        </div>
    </div>
    <div class="col-sm-3 zoom">
        <div class="card text-white bg-danger mb-4" style="max-width: 18rem;">
            <div class="card-body">
              <center><h5 class="card-title">Cantidad de Sustentantes</h5></center>
              <center><p class="card-text"><h1>{{$cantidadSustentantes}}</h1></p></center>
            </div>
        </div>
    </div>
    <div class="col-sm-3 zoom">
        <div class="card text-white bg-info mb-4" style="max-width: 18rem;">
            <div class="card-body">
              <center><h5 class="card-title">Cantidad de Monograficos</h5></center>
              <center><p class="card-text"><h1>{{$cantidadMonograficos}}</h1></p></center>
            </div>
        </div>
    </div>
</div>

@endsection