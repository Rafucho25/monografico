@extends('user.layout')
<title>Monograficos - Crear Escuelas</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Crear un escuela</h2>
        </div>
    </div> <br>
    {!! Form::open(['route' => 'manage.escuelas.store']) !!}
        @csrf
        @include('user.escuelas.fields')

        <center> <br>
            <input type="submit" class="btn btn-success" value="Guardar">
            <a href="{{route('manage.escuelas.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection
