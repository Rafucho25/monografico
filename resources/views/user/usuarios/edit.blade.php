@extends('user.layout')
<title>Monograficos - Modificar Usuarios</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Modificar Usuario</h2>
        </div>
    </div> <br>
    {!! Form::model($user, [ 'method' => 'post', 'route' => ['manage.admin.usuarios.update', $user->id], 'enctype'=>'multipart/form-data']) !!}
        @csrf
        @include('user.usuarios.fields')

        <center> <br>
            <input type="submit" class="btn btn-success" value="Guardar">
            <a href="{{route('manage.admin.usuarios.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection

@section('script')
    <script>
        $('.email').prop('disabled', true);
    </script>
@endsection