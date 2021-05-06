@extends('user.layout')
<title>Monograficos - Modificar Universidades</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Modificar Universidad</h2>
        </div>
    </div> <br>
    {!! Form::model($universidad, [ 'method' => 'post', 'route' => ['manage.universidades.update', $universidad->id]]) !!}
        @csrf
        @include('user.universidades.fields')

        <center> <br>
            <input type="submit" class="btn btn-success" value="Guardar">
            <a href="{{route('manage.universidades.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection
