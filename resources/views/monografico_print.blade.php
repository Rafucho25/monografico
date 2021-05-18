<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imprimir Portada</title>
</head>
<body>
    <diV>
        <center>
            <p style="font-size: 20px">REPUBLICA DOMINICANA</p>
            
            <p style="font-size: 40px">{{$monografico->nombre_universidad}}</p>
            <p style="font-size: 25px">
                {{$monografico->nombre_facultad}} <br>
                {{$monografico->nombre_escuela}} <br>
                Titulo Universitario: {{$monografico->titulo_universitario}} <br>
                Tema: {{$monografico->tema}}
            </p>
        </center>                
    </div>

    <div>
        <center>
            <p style="font-size: 25px">
                Autor/es
            </p>
        </center>
        <center>
            <p style="font-size: 20px">
                @foreach ($autores as $autor)
                    {{$autor->nombres . ' ' . $autor->apellidos . ' ' . $autor->matricula}} <br>
                @endforeach
            </p>
        </center>
    </div>

    <div>
        <center>
            <p style="font-size: 25px">
                Sustentante/s
            </p>
        </center>
        <center>
            <p style="font-size: 20px">
                @foreach ($sustentantes as $sus)
                {{$sus->nombres . ' ' . $sus->apellidos}} <br>
                @endforeach
            </p>
        </center>
    </div>
    
    <div>
        <center>
            <p style="font-size: 20px">
                Recinto {{$monografico->nombre_recinto}} <br>
                {{$fecha}}
            </p>
        </center>
    </div>
</body>
</html>
