@extends('user.layout')
<title>Monograficos - Crear Usuarios</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Crear un Usuario</h2>
        </div>
    </div> <br>
    {!! Form::open(['route' => 'manage.admin.usuarios.store', 'enctype'=>'multipart/form-data']) !!}
        @csrf
        @include('user.usuarios.fields')

        <center> <br>
            <input type="submit" class="btn btn-success" value="Guardar">
            <a href="{{route('manage.admin.usuarios.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection
