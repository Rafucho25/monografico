@extends('user.layout')
<title>Monograficos - Recintos</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Lista de Recintos</h2>
        </div>
        <div class="col-md-2">
            <a href="{{route('manage.recintos.create')}}" style="align:right" class="btn btn-success">Crear Recinto</a>
        </div>
    </div> <br>
    <div class="row">
        <div class="col-md-12 table-responsive">
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
                    @foreach ($recintos as $recinto)
                        <tr>
                            <td>{{$recinto->id}}</td>
                            <td>{{$recinto->nombre}}</td>
                            <td>{{date('d/m/Y H:m:s', strtotime($recinto->created_at))}}</td>
                            <td>
                                <a href="{{route('manage.recintos.show', $recinto->id)}}" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver Recinto"><i class="far fa-eye"></i></a>
                                <a href="{{route('manage.recintos.edit', $recinto->id)}}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Modificar Recinto"><i class="fas fa-pencil-alt"></i></a>
                                <button class="btn btn-danger eliminar" data-bs-target="#deleteModal" id="{{$recinto->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar Recinto"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Numero</th>
                        <th>Nombre</th>
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
                  <h5 class="modal-title" id="exampleModalLabel">Eliminar Recinto</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Esta seguro de querer eliminar este Recinto?
                </div>
                <div class="modal-footer">
                    <form action="{{route('manage.recintos.delete')}}" method="POST">
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