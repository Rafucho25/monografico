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
</html>
