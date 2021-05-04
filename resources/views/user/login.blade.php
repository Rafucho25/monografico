<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('/css/login.css')}}" rel="stylesheet">

<body>
    @include('messages')
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-5 py-5">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Bienvenido</h1>
                <p class="col-lg-10 fs-4"></p>
            </div>
            <div class="col-11 mx-auto col-lg-6">
                <form method="POST" action="{{route('login_post')}}" class="p-5 border rounded-3 bg-light">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Correo</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Contraseña</label>
                    </div>
                    <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" name="remember" id="remember" value="remember-me"> Recuerdame
                    </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar Sesion</button>
                    <hr class="my-4">
                    <center><a class="text-muted" href="{{route('index')}}">Volver al buscador</a></center>
                </form>
            </div>
        </div>
    </div>
</body>
</html>