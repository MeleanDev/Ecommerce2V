@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Categorias')

{{-- plugins --}}
  {{-- Datatable --}}
  @section('plugins.Datatables', true)

{{-- Content body: main page content --}}

@section('content_body')
<div class="container">
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
                            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre de la categoria" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion Corta de la Categoria</label>
                            <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion">
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