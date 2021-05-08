@extends('user.layout')
<title>Monograficos - Modificar Carreras</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Modificar Carrera</h2>
        </div>
    </div> <br>
    {!! Form::model($carrera, [ 'method' => 'post', 'route' => ['manage.carreras.update', $carrera->id]]) !!}
        @csrf
        @include('user.carreras.fields')

        <center> <br>
            <input type="submit" class="btn btn-success" value="Guardar">
            <a href="{{route('manage.carreras.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection
