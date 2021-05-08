@extends('user.layout')
<title>Monograficos - Crear Carreras</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Crear un carrera</h2>
        </div>
    </div> <br>
    {!! Form::open(['route' => 'manage.carreras.store']) !!}
        @csrf
        @include('user.carreras.fields')

        <center> <br>
            <input type="submit" class="btn btn-success" value="Guardar">
            <a href="{{route('manage.carreras.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection
