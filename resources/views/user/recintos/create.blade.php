@extends('user.layout')
<title>Monograficos - Crear Recintos</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Crear un recinto</h2>
        </div>
    </div> <br>
    {!! Form::open(['route' => 'manage.recintos.store']) !!}
        @csrf
        @include('user.recintos.fields')

        <center> <br>
            <input type="submit" class="btn btn-success" value="Guardar">
            <a href="{{route('manage.recintos.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection
