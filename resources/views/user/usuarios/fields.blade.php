<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Datos Generales</h3>
                    </div>
                    @foreach ($errors->all() as $message)
                        <center>
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        </center>
                    @endforeach
                    <hr>
                        @csrf
                        <div class="form-group">
                            <center><img id="imgUser" src="{{isset($user->photo) ? $user->photo : asset('/images/users/template.png')}}" width="200px" height="200px" alt="your image" /></center><br>
                            <input type="file" name="photo" value="{{isset($user->photo) ? $user->photo : asset('/images/users/template.png')}}" id="photo" class="form-control">
                        </div><br>
                        <div class="form-group">
                            {!! Form::label('first_name', 'Nombres:') !!}
                            {!! Form::text('first_name', null, ['class' => 'form-control',  "placeholder" => "Nombres", "required"]) !!}
                        </div><br>
                        <div class="form-group">
                            {!! Form::label('last_name', 'Apellidos:') !!}
                            {!! Form::text('last_name', null, ['class' => 'form-control',  "placeholder" => "Apellidos", "required"]) !!}
                        </div><br>
                        <div class="form-group">
                            {!! Form::label('email', 'Correo Electronico:') !!}
                            {!! Form::text('email', null, ['class' => 'form-control email', "placeholder" => "Correo Electronico", "required"]) !!}
                        </div>
                        <br>
                        @if (!isset($user))
                        <div class="form-group">
                            {!! Form::label('password', 'Contraseña:') !!}
                            {!! Form::password('password', ['class' => 'form-control', "placeholder" => "Contraseña", "required"]) !!}
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>No puede dejar la contraseña vacia</strong>
                            </span>
                        @enderror 
                        <br>
                        <div class="form-group">
                            {!! Form::label('confirm_password', 'Confirmar Contraseña:') !!}
                            {!! Form::password('confirm_password', ['class' => 'form-control', "placeholder" => "Confirmar Contraseña", "required"]) !!}
                        </div>
                        @error('confirm_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>No puede dejar la confirmacion de la contraseña vacia</strong>
                            </span>
                        @enderror 
                        <br>
                        @endif
                        <div class="form-group">
                            {!! Form::label('role', 'Role:') !!}
                            {!! Form::select('role', $roles, $value ?? '', ['class' => 'form-control']) !!}
                        </div> <br>
                </div>
            </div>
        </div>
    </div>
</div>