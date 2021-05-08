@extends('user.layout')
<title>Monograficos - Ver Recintos</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Ver Recinto</h2>
        </div>
    </div> <br>
    {!! Form::model($recinto) !!}
        @csrf
        @include('user.recintos.fields')

        <center> <br>
            <a href="{{route('manage.recintos.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection

@section('script')
    <script>
        $('.form-control').prop('disabled', true);
    </script>
@endsection