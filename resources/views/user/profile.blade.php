@extends('user.layout')
<title>Sistema de Monograficos - Perfil</title>

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Datos Generales</h3>
                        </div>
                        <hr>
                        {!! Form::model($user, ['route' => ['manage.user.update', $user->id ], 'method' => 'post' , 'enctype'=>'multipart/form-data']) !!}
                            @csrf
                            <div class="form-group">
                                <center><img id="imgUser" src="{{isset($user->photo) ? $user->photo : asset('/images/users/template.png')}}" width="200px" height="200px" alt="your image" /></center><br>
                                <input type="file" name="photo" value="{{isset($user->photo) ? $user->photo : asset('/images/users/template.png')}}" id="photo" class="form-control">
                            </div><br>
                            <div class="form-group">
                                {!! Form::label('first_name', 'Nombres:') !!}
                                {!! Form::text('first_name', null, ['class' => 'form-control',  "placeholder" => "Nombres"]) !!}
                            </div><br>
                            <div class="form-group">
                                {!! Form::label('last_name', 'Apellidos:') !!}
                                {!! Form::text('last_name', null, ['class' => 'form-control',  "placeholder" => "Apellidos"]) !!}
                            </div><br>
                            <div class="form-group">
                                {!! Form::label('email', 'Correo Electronico:') !!}
                                {!! Form::text('email', null, ['class' => 'form-control', "disabled",  "placeholder" => "Correo Electronico"]) !!}
                            </div> <br>
                            @php
                                if (Sentinel::getUser()->inRole('Basic')) {
                                    $value = 1;
                                } else {
                                    $value = 2;
                                }
                                
                            @endphp
                            <div class="form-group">
                                {!! Form::label('role', 'Role:') !!}
                                {!! Form::select('role', $roles, $value, ['class' => 'form-control', "disabled"]) !!}
                            </div> <br>
                            <!--TODO: Revisar el boton guardar cuando el input foto esta vacio -->
                            <center><button class="btn btn-success" type="submit">Guardar Cambios</button></center>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgUser').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#photo").change(function(){
        readURL(this);
    });
    </script>
    
@endsection