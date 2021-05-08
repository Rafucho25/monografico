@extends('user.layout')
<title>Monograficos - Ver Escuelas</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Ver Escuela</h2>
        </div>
    </div> <br>
    {!! Form::model($escuela) !!}
        @csrf
        @include('user.escuelas.fields')

        <center> <br>
            <a href="{{route('manage.escuelas.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection

@section('script')
    <script>
        $('.form-control').prop('disabled', true);
    </script>
@endsection