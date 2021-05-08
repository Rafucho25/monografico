@extends('user.layout')
<title>Monograficos - Crear Facultades</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Crear un facultad</h2>
        </div>
    </div> <br>
    {!! Form::open(['route' => 'manage.facultades.store']) !!}
        @csrf
        @include('user.facultades.fields')

        <center> <br>
            <input type="submit" class="btn btn-success" value="Guardar">
            <a href="{{route('manage.facultades.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection
