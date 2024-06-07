@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Productos')

{{-- Content body: main page content --}}

@section('content_body')
<div class="container">
      <div class="tittle text-center">
          <h1>Productos</h1>
      </div>
      <div class="mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" id="btnNuevo">
          Crear Producto
        </button>
      </div>  
      <div class="table-responsive-md">
          <table class="table table-striped table-hover" cellspacing="0" id="datatable" style="width: 100%">
                  <thead class="bg-info">
                      <tr>
                          <th>Foto</th>
                          <th>Codigo</th>  
                          <th>Nombre</th>  
                          <th>Categoria</th> 
                          <th>Cantidad</th>  
                          <th>Precio</th>  
                          <th class="text-center">Accion</th>                
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot class="bg-info">
                      <tr>
                          <th>Foto</th>
                          <th>Codigo</th>  
                          <th>Nombre</th>  
                          <th>Categoria</th> 
                          <th>Cantidad</th>  
                          <th>Precio</th>  
                          <th class="text-center">Accion</th>                  
                      </tr>
                  </tfoot>
          </table>
      </div>
  </div>  
  
  <!-- Modal -->
  <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
              <form id="formulario" enctype="multipart/form-data">
                  @csrf
              <div class="form-group text-center"> 
                  <label for="nombre">Nombre</label> 
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre"> 
                  <small id="nombre" class="form-text text-muted">Nombre del Producto.</small> 
              </div> 
              <div class="form-group text-center"> 
                  <label for="descripcion">descripcion</label> 
                  <input type="text" class="form-control" id="descripcion" placeholder="Descripcion">
                  <small id="descripcion" class="form-text text-muted">Descripcion corta del Producto.</small>  
              </div> 
              <div class="form-group text-center">
                <label for="proveedor">Proveedor del Producto</label>
                <select class="form-control mb-2" id="proveedor" name="proveedor" style="width: 100%" required>
                  <option></option>  
                  <option value="Sin Proveedor">Sin Proveedor</option>  
                </select>
            </div>
            <div class="form-row justify-content-around">
              <div class="form-group col-md-5"> 
                  <label for="cantidad">cantidad disponible</label> 
                  <input type="number" class="form-control" id="cantidad" placeholder="cantidad" min="0">
                  <small id="cantidad" class="form-text text-muted">Cantidad disponible.</small> 
              </div> 
              <div class="form-group col-md-5"> 
                  <label for="precio">precio del Producto</label> 
                  <input type="number" class="form-control" id="precio" placeholder="precio" min="0"> 
                  <small id="precio" class="form-text text-muted">Precio del Producto.</small> 
              </div> 
            </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="btn" class="btn btn-primary"><i class="fas fa-lg fa-save"></i> Guarda</button>
          </div>
      </form>
      </div>
      </div>
  </div>
      

</div>
@stop

{{-- Push extra scripts --}}

@push('js')
    <script>






    </script>
@endpush