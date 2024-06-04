@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Categorias')

{{-- plugins --}}
  {{-- Datatable --}}
  @section('plugins.Datatables', true)

{{-- Content body: main page content --}}

@section('content_body')
<div class="container">
    @include('admin.componts.alert')
    {{-- Titulo --}}
    <div class="tittle h1 text-center">
        <h1>Categorias</h1>
    </div>

    {{-- Boton modal --}}
    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crea">
            Crear Categoria
        </button>
    </div>  

    {{-- Modal --}}
    <div class="modal fade" id="crea" tabindex="-1" role="dialog" aria-labelledby="crea" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('categoria.crear')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="crea">Crear Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="foto">Foto Categoria || Solo Formato (JPG Y PNG)</label>
                            <input type="file" name="foto" class="form-control" accept=".jpg,.png" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre Categoria</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Nombre categoria" pattern="^[a-zA-Z0-9]+$" title="Solo se permiten números y letras sin espacios" required>
                            <small id="nombre" class="form-text text-muted">No se permiten espacion.</small>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion Corta de la Categoria</label>
                            <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion">
                            <small id="descripcion" class="form-text text-muted">descripcion con menos de 255 caracteres.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-lg fa-save"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="table-responsive-md">
        <table class="table table-striped table-hover" cellspacing="0" id="datatable" style="width: 100%">
                <thead class="bg-info">
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>  
                        <th>Cant Productos</th>  
                        <th class="text-center">Accion</th>                  
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $item)
                        <tr>
                            <td><img src="{{ asset($item->foto) }}" class="rounded mx-auto d-block" width="100" alt="{{$item->nombre}}"></td>
                            <td class="text-center">{{$item->nombre}}</td>
                            <td class="text-center">{{$item->descripcion}}</td>
                            <td class="text-center">{{$item->cantidad}}</td>
                            <td class="text-center">
                                <form action="{{route('categoria.eliminar', $item->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn bg-danger" type="submit"><i class='fas fa-trash-alt'></i> Eliminar</button>
                                </form>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editar{{$item->id}}">
                                    <i class="fa fa-edit"></i> Editar
                                </button>

                                    {{-- Modal Editar--}}
                                    <div class="modal fade" id="editar{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editar{{$item->id}}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{route('categoria.editar', $item->id)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-header bg-info">
                                                        <h5 class="modal-title" id="crea">Editar Categoria {{$item->nombre}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset($item->foto) }}" alt="{{$item->nombre}}" class="rounded mx-auto d-block" width="200">
                                                        <div class="form-group">
                                                            <label for="foto">Foto Categoria || Solo Formato (JPG Y PNG)</label>
                                                            <input type="file" name="foto" class="form-control" accept=".jpg,.png">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nombre">Nombre Categoria</label>
                                                            <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="nombre" value="{{$item->nombre}}" placeholder="Nombre categoria" pattern="^[a-zA-Z0-9]+$" title="Solo se permiten números y letras sin espacios" required>
                                                            <small id="nombre" class="form-text text-muted">No se permiten espacion.</small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="descripcion">Descripcion Corta de la Categoria</label>
                                                            <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion" value="{{$item->descripcion}}">
                                                            <small id="descripcion" class="form-text text-muted">descripcion con menos de 255 caracteres.</small>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary"><i class="fas fa-lg fa-save"></i> Guardar Cambios</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-info">
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>  
                        <th>Cant Productos</th>  
                        <th class="text-center">Accion</th>                  
                    </tr>
                </tfoot>
        </table>
    </div>
  </div>  
@stop

{{-- Push extra CSS --}}

@push('css')
    
@endpush

{{-- Push extra scripts --}}

@push('js')
<script>
    var table = new DataTable('#datatable', {
      lengthMenu: [[10, 25, 50, 100],[10, 25, 50, 100]],
      columns: [
              {data: 'foto', name: 'foto', className: 'text-center'},
              {data: 'nombre', name: 'nombre', className: 'text-center'},         
              {data: 'descripcion', name: 'descripcion', className: 'text-center'},  
              {data: 'cantindad', name: 'cantindad', className: 'text-center'},         
      ],
          columnDefs: [{orderable: false, targets: 4}],
          language: {
                  "zeroRecords": "No se encontraron resultados",
                  "emptyTable": "Ningún dato disponible en esta tabla",
                  "lengthMenu": "Mostrar _MENU_ registros",
                  "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "sSearch": "Buscar:",
                  "oPaginate": {
                      "sFirst": "Primero",
                      "sLast":"Último",
                      "sNext":"Siguiente",
                      "sPrevious": "Anterior"
                   },
                   "sProcessing":"Procesando...",
          },        
  });
</script>
@endpush