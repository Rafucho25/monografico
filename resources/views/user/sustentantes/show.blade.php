@extends('user.layout')
<title>Monograficos - Ver Sustentantes</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Ver Sustentante</h2>
        </div>
    </div> <br>
    {!! Form::model($sustentante) !!}
        @csrf
        @include('user.sustentantes.fields')

        <center> <br>
            <a href="{{route('manage.sustentantes.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection

@section('script')
    <script>
        $('.form-control').prop('disabled', true);
    </script>
@endsection