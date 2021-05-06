@extends('user.layout')
<title>Monograficos - Crear Universidades</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Crear una Universidad</h2>
        </div>
    </div> <br>
    {!! Form::open(['route' => 'manage.universidades.store']) !!}
        @csrf
        @include('user.universidades.fields')

        <center> <br>
            <input type="submit" class="btn btn-success" value="Guardar">
            <a href="{{route('manage.universidades.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection
