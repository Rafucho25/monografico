@extends('user.layout')
<title>Monograficos - Ver Facultades</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Ver Facultad</h2>
        </div>
    </div> <br>
    {!! Form::model($recinto) !!}
        @csrf
        @include('user.facultades.fields')

        <center> <br>
            <a href="{{route('manage.facultades.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection

@section('script')
    <script>
        $('.form-control').prop('disabled', true);
    </script>
@endsection