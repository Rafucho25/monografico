    <div class="row">
        <div class="col-md-4">
            {!! Form::label('recinto_id', 'Recinto: ', null) !!}
            {!! Form::select('recinto_id', $recintos, isset($monografico) ? $monografico->recinto_id : null , ['class' => 'form-control']) !!} <br>
        </div>
        <div class="col-md-4">
            {!! Form::label('universidad_id', 'Universidad: ', null) !!}
            {!! Form::select('universidad_id', $universidades, isset($monografico) ? $monografico->universidad_id : null , ['class' => 'form-control']) !!} <br>
        </div>
        <div class="col-md-4">
            {!! Form::label('facultad_id', 'Facultad: ', null) !!}
            {!! Form::select('facultad_id', $facultades, isset($monografico) ? $monografico->facultad_id : null , ['class' => 'form-control']) !!} <br>
        </div>
        <div class="col-md-3">
            {!! Form::label('escuela_id', 'Escuela: ', null) !!}
            {!! Form::select('escuela_id', $escuelas, isset($monografico) ? $monografico->escuela_id : null , ['class' => 'form-control']) !!} <br>
        </div>
        <div class="col-md-3">
            {!! Form::label('carrera_id', 'Carrera: ', null) !!}
            {!! Form::select('carrera_id', $carreras, isset($monografico) ? $monografico->carrera_id : null , ['class' => 'form-control']) !!} <br>
        </div>
        <div class="col-md-2">
            {!! Form::label('fecha', 'Fecha: ', null) !!}
            {!! Form::date('fecha', null, ['class' => 'form-control', 'required']) !!} <br>
        </div>
        <div class="col-md-4">
            {!! Form::label('tema', 'Tema: ', null) !!}
            {!! Form::text('tema', null, ['class' => 'form-control', 'required']) !!} <br>
        </div>
    </div>
    @if(isset($autores))
        <div class="row">
            <div class="col-md-4">
                {!! Form::label('autor_id', 'Autor: ', null) !!}
                {!! Form::select('autor_id', $autores, null, ['class' => 'form-control']) !!} <br>
            </div>
            <div class="col-md-2"><br>
                <button type="button" class="btn btn-success form-control" onclick="agregarAutor()">Agregar Autor</button>
            </div>
            <div class="col-md-4">
                {!! Form::label('sustentante_id', 'Sustentante: ', null) !!}
                {!! Form::select('sustentante_id', $sustentantes, null, ['class' => 'form-control']) !!} <br>
            </div>
            <div class="col-md-2"><br>
                <button type="button" class="btn btn-success form-control" onclick="agregarSustentante()">Agregar Sustentante</button>
            </div>
        </div>
    @else
    <div class="row">
        <div class="col-md-6">
            <h3>Lista de Autores</h3>
        </div>
        <div class="col-md-6">
            <h3>Lista de Sustentantes</h3>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <input required type="text" class="form-control" name="autores" id="autores" value=""/>
        </div>
        <div class="col-md-6">
            <input required type="text" class="form-control" name="sustentantes" id="sustentantes" value=""/>
        </div>
    </div>