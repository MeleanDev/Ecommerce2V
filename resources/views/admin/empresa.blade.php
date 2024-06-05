@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Empresa')

{{-- Content body: main page content --}}
{{-- script --}}


@section('content_body')
    <div class="container">
      @include('admin.componts.alert')
        <div class="tittle text-center">
            <h1>Datos de la empresa</h1>
        </div>
        <div class="form">
            <form action="{{route('empresa.datos')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="img text-center mb-3">
                    @if (isset($datos) && isset($datos->foto) && !empty($datos->foto))
                        <img class="rounded" src="{{ asset($datos->foto) }}" width="122" height="26" alt="img empresa">
                    @else
                        <img class="rounded" src="{{ asset('vendor/adminlte/dist/img/logo.png') }}" width="122" height="26" alt="img empresa">
                    @endif
                </div>
                <div class="text-center">
                    <input type="file" id="foto" name="foto" accept=".jpg,.png">
                    <small id="foto" class="form-text text-muted">Se recomienda una dimension de 122x26.</small>
                    @if ($errors->has('foto'))
                      <span class="error text-danger">{{ $errors->first('foto') }}</span>
                    @endif
                </div>
                <div class="Datos de la empresa Principales">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="nombre">Nombre de la empresa</label>
                      <input type="text" name="nombreEmpresa" class="form-control" id="nombre" placeholder="Nombre de la empresa"
                      @if ($datos) 
                      value="{{$datos->nombreEmpresa}}" 
                      @endif 
                      required>
                      <small id="nombreEmpresa" class="form-text text-muted">Esta informacion saldra en la Web del Ecoommerce.</small>
                      @if ($errors->has('nombreEmpresa'))
                          <span class="error text-danger">{{ $errors->first('nombreEmpresa') }}</span>
                      @endif
                    </div>
                    <div class="form-group col-md-6">
                      <label for="razonSocial">Razon social</label>
                      <input type="text" name="razonSocial" class="form-control" id="razonSocial" placeholder="Razon social"
                      @if ($datos) 
                      value="{{$datos->razonSocial}}" 
                      @endif 
                      >
                      <small id="razonSocial" class="form-text text-muted">Esta informacion es opcional.</small>
                      @if ($errors->has('razonSocial'))
                        <span class="error text-danger">{{ $errors->first('razonSocial') }}</span>
                      @endif
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
                        <small id="rif" class="form-text text-muted">Esta informacion saldra en la Web del Ecoommerce.</small>
                        @if ($errors->has('rif'))
                          <span class="error text-danger">{{ $errors->first('rif') }}</span>
                      @endif
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
                        <small id="correo" class="form-text text-muted">Esta informacion saldra en la Web del Ecoommerce.</small>
                        @if ($errors->has('correo'))
                          <span class="error text-danger">{{ $errors->first('correo') }}</span>
                      @endif
                      </div>
                      <div class="form-group col-md-6">
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Telefono"
                        @if ($datos) 
                        value="{{$datos->telefono}}" 
                        @endif  
                        required>
                        <small id="telefono" class="form-text text-muted">Esta informacion saldra en la Web del Ecoommerce.</small>
                        @if ($errors->has('telefono'))
                        <span class="error text-danger">{{ $errors->first('telefono') }}</span>
                      @endif
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Direccion"
                    @if ($datos) 
                    value="{{$datos->direccion}}" 
                    @endif  
                    required>
                    <small id="direccion" class="form-text text-muted">Esta informacion saldra en la Web del Ecoommerce.</small>
                    @if ($errors->has('direccion'))
                    <span class="error text-danger">{{ $errors->first('direccion') }}</span>
                      @endif
                  </div>
                  <div class="form-row mb-3">
                    <div class="form-group col-md-6">
                      <label for="ciudad">Ciudad</label>
                      <input type="text" name="ciudad" class="form-control" id="ciudad" placeholder="Ciudad"
                      @if ($datos) 
                      value="{{$datos->ciudad}}" 
                      @endif  
                      required>
                      <small id="ciudad" class="form-text text-muted">Esta informacion saldra en la Web del Ecoommerce.</small>
                      @if ($errors->has('ciudad'))
                      <span class="error text-danger">{{ $errors->first('ciudad') }}</span>
                      @endif
                    </div>
                    <div class="form-group col-md-4">
                      <label for="estado">Estado</label>
                      <input type="text" name="estado" class="form-control" id="estado" placeholder="Estado"
                      @if ($datos) 
                      value="{{$datos->estado}}" 
                      @endif  
                      required>
                      <small id="estado" class="form-text text-muted">Esta informacion saldra en la Web del Ecoommerce.</small>
                      @if ($errors->has('estado'))
                      <span class="error text-danger">{{ $errors->first('estado') }}</span>
                      @endif
                    </div>
                    <div class="form-group col-md-2">
                      <label for="codigopostal">Codigo Postal</label>
                      <input type="text" name="codigoPostal" class="form-control" id="codigopostal" placeholder="Codigo postal"
                      @if ($datos) 
                      value="{{$datos->codigoPostal}}" 
                      @endif  
                      required>
                      <small id="codigoPostal" class="form-text text-muted">Esta informacion saldra en la Web del Ecoommerce.</small>
                      @if ($errors->has('codigoPostal'))
                      <span class="error text-danger">{{ $errors->first('codigoPostal') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="Datos de redes sociales">
                  <h2 class="text-center h2">Links de GoogleMap y Redes Sociales</h2>
                  <div class="form-group">
                    <label for="google">GoogleMap Link || Solamente pegar la parte src</label>
                    <input type="text" class="form-control" id="google" name="google" placeholder="Link del GoogleMap de la empresa" 
                    @if ($datos) 
                      value="{{$datos->google}}" 
                      @endif 
                      required>
                    <small id="google" class="form-text text-muted">Esta informacion saldra en la Web del Ecoommerce.</small>
                    @if ($errors->has('google'))
                    <span class="error text-danger">{{ $errors->first('google') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="facebook">Facebook Link</label>
                    <input type="text" class="form-control" id="facebook" name="facebook"  placeholder="Link del facebook de la empresa" 
                    @if ($datos) 
                      value="{{$datos->facebook}}" 
                      @endif 
                      required>
                    <small id="facebook" class="form-text text-muted">Esta informacion saldra en la Web del Ecoommerce.</small>
                    @if ($errors->has('facebook'))
                    <span class="error text-danger">{{ $errors->first('facebook') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="instagram">Instagram Link</label>
                    <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Link del instagram de la empresa" 
                    @if ($datos) 
                      value="{{$datos->instagram}}" 
                      @endif 
                      required>
                    <small id="instagram" class="form-text text-muted">Esta informacion saldra en la Web del Ecoommerce.</small>
                    @if ($errors->has('instagram'))
                    <span class="error text-danger">{{ $errors->first('instagram') }}</span>
                    @endif
                  </div>
                </div>
                <div class="botones text-center">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-lg fa-save"></i> Guardar</button>
                </div>
              </form>
        </div>
    </div>
@stop
