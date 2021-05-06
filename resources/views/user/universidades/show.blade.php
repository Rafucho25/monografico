@extends('user.layout')
<title>Monograficos - Ver Universidades</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Ver Universidad</h2>
        </div>
    </div> <br>
    {!! Form::model($universidad) !!}
        @csrf
        @include('user.universidades.fields')

        <center> <br>
            <a href="{{route('manage.universidades.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection

@section('script')
    <script>
        $('.form-control').prop('disabled', true);
    </script>
@endsection