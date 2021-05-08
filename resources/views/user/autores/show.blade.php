@extends('user.layout')
<title>Monograficos - Ver Autores</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Ver Autor</h2>
        </div>
    </div> <br>
    {!! Form::model($autor) !!}
        @csrf
        @include('user.autores.fields')

        <center> <br>
            <a href="{{route('manage.autores.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection

@section('script')
    <script>
        $('.form-control').prop('disabled', true);
    </script>
@endsection