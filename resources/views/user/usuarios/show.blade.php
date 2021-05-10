@extends('user.layout')
<title>Monograficos - Ver Usuarios</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Ver Usuario</h2>
        </div>
    </div> <br>
    {!! Form::model($user) !!}
        @csrf
        @include('user.usuarios.fields')

        <center> <br>
            <a href="{{route('manage.admin.usuarios.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection

@section('script')
    <script>
        $('.form-control').prop('disabled', true);
    </script>
@endsection