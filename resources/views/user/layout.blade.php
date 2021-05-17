<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  @yield('header')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('manage.index')}}">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="{{route('manage.recintos.index')}}">Recintos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('manage.universidades.index')}}">Universidades</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('manage.facultades.index')}}">Facultades</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('manage.escuelas.index')}}">Escuelas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('manage.carreras.index')}}">Carreras</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('manage.autores.index')}}">Autores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('manage.sustentantes.index')}}">Sustentantes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('manage.monograficos.index')}}">Monograficos</a>
            </li>
            @if (Sentinel::inRole('Admin'))
            <li class="nav-item">
              <a class="nav-link" href="{{route('manage.admin.usuarios.index')}}">Usuarios</a>
            </li>
            @endif
          </ul>
          <span class="navbar-text">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="{{Sentinel::getUser()->photo}}" width="40px" height="40px" alt="">
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarScrollingDropdown">
                  <li class="dropdown-item">Hola {{Sentinel::getUser()->first_name}}</li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{route('manage.user.profile')}}">Perfil</a></li>
                  <li><a class="dropdown-item" href="{{route('logout')}}">Cerrar Sesion</a></li>
                </ul>
              </li>
            </ul>
          </span>
        </div>
      </div>
    </nav><hr>
    <div class="container"> 
      @include('messages')
      @yield('body')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
</script>
@yield('script')
</html>