@extends('user.layout')
<title>Monograficos - Modificar Monograficos</title>
@section('header')
    
<link href="{{asset('/css/tagsinput/app.css')}}" rel="stylesheet">
<link href="{{asset('/css/tagsinput/tagsinput.css')}}" rel="stylesheet">
<link href="{{asset('/css/tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">
@endsection

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Modificar Monografico</h2>
        </div>
    </div> <br>
    {!! Form::model($monografico, [ 'method' => 'post', 'route' => ['manage.monograficos.update', $monografico->id]]) !!}
        @csrf
        @include('user.monograficos.fields')

        <center> <br>
            <input type="submit" class="btn btn-success" value="Guardar">
            <a href="{{route('manage.monograficos.index')}}" class="btn btn-warning">Volver al listado</a>
        </center>
    {!! Form::close() !!}
@endsection

@section('script')
    <script src="{{asset('/js/bootstrap-tagsinput.js')}}"></script>

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
        /*Codigo que agrega el autor del select al input*/
        function agregarAutor(){
            var idautor = $('#autor_id').val(); 
            var nombreautor = $("#autor_id option:selected").text();
            var cadena = idautor + ' - ' + nombreautor; 
        
            $('#autores').tagsinput('add', { id: idautor, text: nombreautor});
        }
        
        /*Codigo que agrega el autor del select al input*/
        function agregarSustentante(){
            var idsustentante = $('#sustentante_id').val(); 
            var nombresustentante = $("#sustentante_id option:selected").text();
            var cadena = idsustentante + ' - ' + nombresustentante; 
        
            $('#sustentantes').tagsinput('add', { id: idsustentante, text: nombresustentante});
        }
    </script>
@endsection
