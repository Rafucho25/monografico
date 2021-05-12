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
                            {!! Form::text('email', null, ['class' => 'form-control email', "placeholder" => "Correo Electronico"]) !!}
                        </div> <br>
                        @if (!isset($user))
                        <div class="form-group">
                            {!! Form::label('password', 'Contraseña:') !!}
                            {!! Form::password('password', ['class' => 'form-control', "placeholder" => "Contraseña"]) !!}
                        </div> <br>
                        <div class="form-group">
                            {!! Form::label('confirm_password', 'Confirmar Contraseña:') !!}
                            {!! Form::password('confirm_password', ['class' => 'form-control', "placeholder" => "Confirmar Contraseña"]) !!}
                        </div> <br>
                        @endif
                        <div class="form-group">
                            {!! Form::label('role', 'Role:') !!}
                            {!! Form::select('role', $roles, $value, ['class' => 'form-control']) !!}
                        </div> <br>
                </div>
            </div>
        </div>
    </div>
</div>