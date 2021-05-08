@extends('user.layout')
<title>Monograficos - Modificar Facultades</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Modificar Facultad</h2>
        </div>
    </div> <br>
    {!! Form::model($facultad, [ 'method' => 'post', 'route' => ['manage.facultades.update', $facultad->id]]) !!}
        @csrf
        @include('user.facultades.fields')

        <center> <br>
            <input type="submit" class="btn btn-success" value="Guardar">
            <a href="{{route('manage.facultades.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection
