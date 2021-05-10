    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            {!! Form::label('nombres', 'Nombres: ', null) !!}
            {!! Form::text('nombres', null, ['class' => 'form-control']) !!} <br>
            {!! Form::label('apellidos', 'Apellidos: ', null) !!}
            {!! Form::text('apellidos', null, ['class' => 'form-control']) !!} <br>
            {!! Form::label('matricula', 'Matricula: ', null) !!}
            {!! Form::text('matricula', null, ['class' => 'form-control']) !!} <br>
        </div>
        <div class="col-md-4">
        </div>
    </div>