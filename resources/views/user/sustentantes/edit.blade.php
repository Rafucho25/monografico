@extends('user.layout')
<title>Monograficos - Modificar Sustentantes</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Modificar Sustentante</h2>
        </div>
    </div> <br>
    {!! Form::model($sustentante, [ 'method' => 'post', 'route' => ['manage.sustentantes.update', $sustentante->id]]) !!}
        @csrf
        @include('user.sustentantes.fields')

        <center> <br>
            <input type="submit" class="btn btn-success" value="Guardar">
            <a href="{{route('manage.sustentantes.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection
