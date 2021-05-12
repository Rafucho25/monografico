@extends('user.layout')
<title>Monograficos - Ver Monograficos</title>
@section('header')
    
<link href="{{asset('/css/tagsinput/app.css')}}" rel="stylesheet">
<link href="{{asset('/css/tagsinput/tagsinput.css')}}" rel="stylesheet">
<link href="{{asset('/css/tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">
@endsection

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Ver Monografico</h2>
        </div>
    </div> <br>
    {!! Form::model($monografico) !!}
        @csrf
        @include('user.monograficos.fields')

        <center> <br>
            <a href="{{route('manage.monograficos.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection

@section('script')
    <script src="{{asset('/js/bootstrap-tagsinput.js')}}"></script>
    <script>
        $('.form-control').prop('disabled', true);
    </script>

    <script>
    $(document).ready(function() {
        $('#autores').tagsinput({
            itemValue: 'id',
            itemText: 'text'
        });
        
        $('#sustentantes').tagsinput({
            itemValue: 'id',
            itemText: 'text'
        });

        $(window).keydown(function(event){
            if(event.keyCode == 13) {
            event.preventDefault();
            return false;
            }
        });
        
        @foreach ($autores_monografico as $autor)
            
            var id = {{$autor->id}};
            var nombre = '{{$autor->nombres}}'; 
            $('#autores').tagsinput('add', { id: id, text: nombre});
        @endforeach                     
        
        @foreach ($sustentantes_monografico as $sustentante)
            
            var id = {{$sustentante->id}};
            var nombre = '{{$sustentante->nombres}}'; 
            $('#sustentantes').tagsinput('add', { id: id, text: nombre});
        @endforeach                                                                                                                                                                                         
    });  
    </script>

    <script>
    $(document).ready(function() {
        $('[data-role="remove"]').hide();                                                                                                                                                                                              
    });  
    </script>
    
@endsection
