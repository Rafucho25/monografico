@extends('user.layout')
<title>Monograficos - Ver Carreras</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Ver Carrera</h2>
        </div>
    </div> <br>
    {!! Form::model($carrera) !!}
        @csrf
        @include('user.carreras.fields')

        <center> <br>
            <a href="{{route('manage.carreras.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection

@section('script')
    <script>
        $('.form-control').prop('disabled', true);
    </script>
@endsection