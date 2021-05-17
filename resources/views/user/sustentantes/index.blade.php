@extends('user.layout')
<title>Monograficos - Sustentantes</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Lista de Sustentantes</h2>
        </div>
        <div class="col-md-2">
            <a href="{{route('manage.sustentantes.create')}}" style="align:right" class="btn btn-success">Crear Sustentante</a>
        </div>
    </div> <br>
    <div class="row">
        <div class="col-md-12 table-responsive">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Fecha Registro</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sustentantes as $sustentante)
                        <tr>
                            <td>{{$sustentante->id}}</td>
                            <td>{{$sustentante->nombres}}</td>
                            <td>{{$sustentante->apellidos}}</td>
                            <td>{{date('d/m/Y H:m:s', strtotime($sustentante->created_at))}}</td>
                            <td>
                                <a href="{{route('manage.sustentantes.show', $sustentante->id)}}" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver Sustentante"><i class="far fa-eye"></i></a>
                                <a href="{{route('manage.sustentantes.edit', $sustentante->id)}}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Modificar Sustentante"><i class="fas fa-pencil-alt"></i></a>
                                <button class="btn btn-danger eliminar" data-bs-target="#deleteModal" id="{{$sustentante->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar Sustentante"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Numero</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Fecha Registro</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <section>
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-danger">
                  <h5 class="modal-title" id="exampleModalLabel">Eliminar Sustentante</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Esta seguro de querer eliminar este Sustentante?
                </div>
                <div class="modal-footer">
                    <form action="{{route('manage.sustentantes.delete')}}" method="POST">
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
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                        });
                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        });
                    });
                }
            })
        });


        $('.eliminar').click(function() { 
            var myModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            myModal.show();
            let id = this.id;
            $('#id').val(id);
        });
    </script>
@endsection