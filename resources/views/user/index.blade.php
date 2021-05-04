@extends('user.layout')
<title>Sistema de Monograficos</title>

@section('body')
    @for ($i = 0; $i < 1000; $i++)
        {{$i}} <hr>
    @endfor
@endsection