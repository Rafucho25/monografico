@extends('user.layout')
<title>Monograficos - Modificar Escuelas</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Modificar Escuela</h2>
        </div>
    </div> <br>
    {!! Form::model($escuela, [ 'method' => 'post', 'route' => ['manage.escuelas.update', $escuela->id]]) !!}
        @csrf
        @include('user.escuelas.fields')

        <center> <br>
            <input type="submit" class="btn btn-success" value="Guardar">
            <a href="{{route('manage.escuelas.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection
