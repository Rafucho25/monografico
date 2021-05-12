@extends('user.layout')
<title>Monograficos - Usuarios</title>

@section('body')
    <div class="row">
        <div class="col-md-10">
            <h2>Lista de Usuarios</h2>
        </div>
        <div class="col-md-2">
            <a href="{{route('manage.admin.usuarios.create')}}" style="align:right" class="btn btn-success">Crear Usuario</a>
        </div>
    </div> <br>
    <div class="row">
        <div class="col-md-12">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Role</th>
                        <th>Fecha Registro</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        @php
                            $user = Sentinel::findById($usuario->id);
                            
                            if ($user->inRole('Basic')) {
                                $role = 'Basic';
                            } else {
                                $role = 'Admin';
                            }                            
                        @endphp
                        <tr>
                            <td>{{$usuario->id}}</td>
                            <td>{{$usuario->first_name}}</td>
                            <td>{{$usuario->last_name}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$role}}</td>
                            <td>{{date('d/m/Y H:m:s', strtotime($usuario->created_at))}}</td>
                            <td>
                                <a href="{{route('manage.admin.usuarios.show', $usuario->id)}}" class="btn btn-info">Detalles</a>
                                <a href="{{route('manage.admin.usuarios.edit', $usuario->id)}}" class="btn btn-primary">Modificar</a>
                                @if ($usuario->id != Sentinel::getUser()->id)
                                    <button class="btn btn-danger eliminar" data-bs-toggle="modal" data-bs-target="#deleteModal" id="{{$usuario->id}}">Eliminar</button>
                                @endif
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
                  <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Esta seguro de querer eliminar esta Usuario?
                </div>
                <div class="modal-footer">
                    <form action="{{route('manage.admin.usuarios.delete')}}" method="POST">
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