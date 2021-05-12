@extends('user.layout')
<title>Monograficos - Crear Monograficos</title>
@section('header')
    
<link href="{{asset('/css/tagsinput/app.css')}}" rel="stylesheet">
<link href="{{asset('/css/tagsinput/tagsinput.css')}}" rel="stylesheet">
<link href="{{asset('/css/tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">
@endsection

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Crear un monografico</h2>
        </div>
    </div> <br>
    {!! Form::open(['route' => 'manage.monograficos.store']) !!}
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
$("form").submit(function() {
    $('.cabecera').prop('disabled', false );
    return true;
});

$(document).ready(function() {
    $('.edit').prop('disabled', true );

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
