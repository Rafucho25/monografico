@extends('user.layout')
<title>Monograficos - Modificar Autores</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Modificar Autor</h2>
        </div>
    </div> <br>
    {!! Form::model($autor, [ 'method' => 'post', 'route' => ['manage.autores.update', $autor->id]]) !!}
        @csrf
        @include('user.autores.fields')

        <center> <br>
            <input type="submit" class="btn btn-success" value="Guardar">
            <a href="{{route('manage.autores.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection
