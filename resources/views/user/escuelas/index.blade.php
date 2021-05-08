@extends('user.layout')
<title>Monograficos - Escuelas</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Lista de Escuelas</h2>
        </div>
        <div class="col-md-2">
            <a href="{{route('manage.escuelas.create')}}" style="align:right" class="btn btn-success">Crear Escuela</a>
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
                    @foreach ($escuelas as $escuela)
                        <tr>
                            <td>{{$escuela->id}}</td>
                            <td>{{$escuela->nombre}}</td>
                            <td>{{date('d/m/Y H:m:s', strtotime($escuela->created_at))}}</td>
                            <td>
                                <a href="{{route('manage.escuelas.show', $escuela->id)}}" class="btn btn-info">Detalles</a>
                                <a href="{{route('manage.escuelas.edit', $escuela->id)}}" class="btn btn-primary">Modificar</a>
                                <button class="btn btn-danger eliminar" data-bs-toggle="modal" data-bs-target="#deleteModal" id="{{$escuela->id}}">Eliminar</button>
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
                  <h5 class="modal-title" id="exampleModalLabel">Eliminar Escuela</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Esta seguro de querer eliminar este Escuela?
                </div>
                <div class="modal-footer">
                    <form action="{{route('manage.escuelas.delete')}}" method="POST">
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