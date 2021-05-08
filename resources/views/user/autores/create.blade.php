@extends('user.layout')
<title>Monograficos - Crear Autores</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Crear un autor</h2>
        </div>
    </div> <br>
    {!! Form::open(['route' => 'manage.autores.store']) !!}
        @csrf
        @include('user.autores.fields')

        <center> <br>
            <input type="submit" class="btn btn-success" value="Guardar">
            <a href="{{route('manage.autores.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection
