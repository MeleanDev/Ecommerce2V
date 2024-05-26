@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Empresa')

{{-- plugins --}}
  {{-- Select2 --}}
  @section('plugins.Select2', true)
  {{-- Sweetalert2 --}}
  @section('plugins.Sweetalert2', true)

{{-- Content body: main page content --}}

@section('content_body')
    <div class="container">
        <div class="tittle text-center">
            <h1>Datos de la empresa</h1>
        </div>
        <div class="form">
            <form action="{{route('empresa.datos')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="img text-center mb-3">
                    @if (isset($datos) && isset($datos->foto) && !empty($datos->foto))
                        <img class="rounded" src="{{ asset($datos->foto) }}" width="200" alt="img empresa">
                    @else
                        <img class="rounded" src="{{ asset('vendor/adminlte/dist/img/logo.png') }}" width="200" alt="img empresa">
                    @endif
                </div>
                <div class="text-center">
                    <input type="file" id="foto" name="foto" accept=".jpg,.png">
                    <small id="foto" class="form-text text-muted">Esta imagen saldra en la fatura y en la Web del Ecoommerce.</small>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="nombre">Nombre de la empresa</label>

                    <input type="text" name="nombreEmpresa" class="form-control" id="nombre" placeholder="Electronic Art"
                    @if ($datos) 
                    value="{{$datos->nombreEmpresa}}" 
                    @endif 
                    required>

                    <small id="nombre" class="form-text text-muted">Esta informacion saldra en la factura y en la Web del Ecoommerce.</small>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="razonSocial">Razon social</label>
                    <input type="text" name="razonSocial" class="form-control" id="razonSocial" placeholder="Razon social"
                    @if ($datos) 
                    value="{{$datos->razonSocial}}" 
                    @endif 
                    >
                    <small id="razonSocial" class="form-text text-muted">Esta informacion es opcional.</small>
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="cedula">Rif/Cedula</label>
                      <input type="text" name="rif" class="form-control" id="cedula" placeholder="Rif/Cedula"
                      @if ($datos) 
                      value="{{$datos->rif}}" 
                      @endif  
                      required>
                      <small id="cedula" class="form-text text-muted">Esta informacion saldra en la factura.</small>
                    </div>
                  </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="correo">Correo</label>
                      <input type="email" name="correo" class="form-control" id="correo" placeholder="Correo electronico"
                      @if ($datos) 
                      value="{{$datos->correo}}" 
                      @endif  
                      required>
                      <small id="correo" class="form-text text-muted">Esta informacion saldra en la factura y en la Web del Ecoommerce.</small>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="telefono">Telefono</label>
                      <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Telefono"
                      @if ($datos) 
                      value="{{$datos->telefono}}" 
                      @endif  
                      required>
                      <small id="telefono" class="form-text text-muted">Esta informacion saldra en la factura y en la Web del Ecoommerce.</small>
                    </div>
                  </div>
                <div class="form-group">
                  <label for="direccion">Direccion</label>
                  <input type="text" name="direccion" class="form-control" id="direccion" placeholder="1234 Main St"
                  @if ($datos) 
                  value="{{$datos->direccion}}" 
                  @endif  
                  required>
                  <small id="direccion" class="form-text text-muted">Esta informacion saldra en la factura y en la Web del Ecoommerce.</small>
                </div>
                <div class="form-row mb-3">
                  <div class="form-group col-md-6">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" name="ciudad" class="form-control" id="ciudad"
                    @if ($datos) 
                    value="{{$datos->ciudad}}" 
                    @endif  
                    required>
                    <small id="ciudad" class="form-text text-muted">Esta informacion saldra en la factura y en la Web del Ecoommerce.</small>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" class="form-control" id="estado"
                    @if ($datos) 
                    value="{{$datos->estado}}" 
                    @endif  
                    required>
                    <small id="estado" class="form-text text-muted">Esta informacion saldra en la factura.</small>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="codigopostal">Codigo Postal</label>
                    <input type="text" name="codigoPostal" class="form-control" id="codigopostal"
                    @if ($datos) 
                    value="{{$datos->codigoPostal}}" 
                    @endif  
                    required>
                    <small id="codigoPostal" class="form-text text-muted">Esta informacion saldra en la factura.</small>
                  </div>
                </div>
                <div class="botones text-center">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-lg fa-save"></i> Guardar</button>
                </div>
              </form>
        </div>
    </div>
@stop
