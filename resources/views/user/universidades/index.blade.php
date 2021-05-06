@extends('user.layout')
<title>Monograficos - Universidades</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Lista de Universidades</h2>
        </div>
        <div class="col-md-2">
            <a href="{{route('manage.universidades.create')}}" style="align:right" class="btn btn-success">Crear Universidad</a>
        </div>
    </div> <br>
    <div class="row">
        <div class="col-md-12">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Nombre</th>
                        <th>Fecha Registro</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($universidades as $universidad)
                        <tr>
                            <td>{{$universidad->id}}</td>
                            <td>{{$universidad->nombre}}</td>
                            <td>{{date('d/m/Y H:m:s', strtotime($universidad->created_at))}}</td>
                            <td>
                                <a href="{{route('manage.universidades.show', $universidad->id)}}" class="btn btn-info">Detalles</a>
                                <a href="{{route('manage.universidades.edit', $universidad->id)}}" class="btn btn-primary">Modificar</a>
                                <button class="btn btn-danger eliminar" data-bs-toggle="modal" data-bs-target="#deleteModal" id="{{$universidad->id}}">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <section>
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-danger">
                  <h5 class="modal-title" id="exampleModalLabel">Eliminar Universidad</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Esta seguro de querer eliminar esta Universidad?
                </div>
                <div class="modal-footer">
                    <form action="{{route('manage.universidades.delete')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-danger" value="Eliminar">
                    </form>
                </div>
              </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                language: { "url": "{{ asset('js/datatable/Spanish.json') }}" },
            })
        });

        $('.eliminar').click(function() { 
            let id = this.id;
            $('#id').val(id);
        });
    </script>
@endsection