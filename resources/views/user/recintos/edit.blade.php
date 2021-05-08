@extends('user.layout')
<title>Monograficos - Modificar Recintos</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Modificar Recinto</h2>
        </div>
    </div> <br>
    {!! Form::model($recinto, [ 'method' => 'post', 'route' => ['manage.recintos.update', $recinto->id]]) !!}
        @csrf
        @include('user.recintos.fields')

        <center> <br>
            <input type="submit" class="btn btn-success" value="Guardar">
            <a href="{{route('manage.recintos.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection
