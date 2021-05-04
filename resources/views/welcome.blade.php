<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Busqueda</title>
  </head>
  <body>
    @include('messages')
    <div class="s002">
      <form method="get" action="{{route('result_search')}}">
        <fieldset> @csrf
          <legend>Busqueda de Monograficos</legend>
        </fieldset>
        <div class="inner-form">
          <div class="input-field first-wrap">
            <input id="search" name="search" type="text" placeholder="Escriba aqui" />
          </div>
          <div class="input-field fouth-wrap">
            <select data-trigger="" name="filter">
              <option value="tema">Tema</option>
              <option value="universidad">Universidad</option>
              <option value="facultad">Facultad</option>
              <option value="escuela">Escuela</option>
            </select>
          </div>
          <div class="input-field fifth-wrap">
            <input class="btn-search" type="submit" value="Buscar">
          </div>
        </div>
      </form>
    </div>
  </body>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="js/extention/choices.js"></script>
  <script src="js/extention/flatpickr.js"></script>
  <script>
    flatpickr(".datepicker",
    {});

  </script>
  <script>
    const choices = new Choices('[data-trigger]',
    {
      searchEnabled: false,
      itemSelectText: '',
    });

  </script>
  <script>
    const { Toast } = bootstrap;

    const htmlMarkup = `
    <div class="toast align-items-center text-white bg-primary border-0 position-fixed bottom-0 end-0 p-3" data-bs-delay="10000000000000" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
        <div class="toast-body">
        @if (Sentinel::check())
          <a style="color: white" href="{{route('manage.index')}}">Ir al panel principal</a>
        @else
          Eres un Usuario? <a style="color: white" href="{{route('login')}}">Inicia Sesion</a>
        @endif
        </div>
    </div>
    </div>
    `;

    function toast() {
        var template = document.createElement('template')
        html = htmlMarkup.trim()
        template.innerHTML = html
        return template.content.firstChild
    }


    var toastEl = toast();
    document.body.appendChild(toastEl)
    const myToast = new Toast(toastEl);
    myToast.show();
  </script>
</html>
