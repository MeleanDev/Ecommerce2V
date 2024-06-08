@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Empresa')

{{-- plugins --}}
  {{-- Sweetalert2 --}}
  @section('plugins.Sweetalert2', true)

{{-- Content body: main page content --}}
{{-- script --}}


@section('content_body')
    <div class="container">
        <div class="tittle text-center">
            <h1>Datos de la empresa</h1>
        </div>
        <div class="form">
            <form id="formulario" enctype="multipart/form-data">
                @csrf
                <div class="img text-center mb-3">
                  <img class="rounded" id="preview" src="{{ asset($datos->foto) }}" width="122" height="26" alt="img empresa">
                </div>
                {{-- Foto --}}
                <div class="text-center">
                    <input type="file" id="foto" accept=".jpg,.png">
                    <small class="form-text text-muted">Se recomienda una dimension de 122x26.</small>
                    @if ($errors->has('foto'))
                      <span class="error text-danger">{{ $errors->first('foto') }}</span>
                    @endif
                </div>
                {{-- Empresa DATOS --}}
                <div class="Datos de la empresa Principales">
                  {{-- Nombre y razon social --}}
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="nombreEmpresa">Nombre de la empresa</label>
                      <input type="text" class="form-control" name="nombreEmpresa" id="nombreEmpresa" placeholder="Nombre de la empresa"
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
                      <input type="text" class="form-control" name="razonSocial" id="razonSocial" placeholder="Razon social"
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
                  {{-- Rif --}}
                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="rif">Rif/Cedula</label>
                        <input type="text" class="form-control" name="rif" id="rif" placeholder="Rif/Cedula"
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
                  {{-- Correo y Telefono --}}
                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="correo">Correo</label>
                        <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo electronico"
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
                        <input type="text"  class="form-control" name="telefono" id="telefono" placeholder="Telefono"
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
                  {{-- Direccion --}}
                  <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion"
                    @if ($datos) 
                    value="{{$datos->direccion}}" 
                    @endif  
                    required>
                    <small id="direccion" class="form-text text-muted">Esta informacion saldra en la Web del Ecoommerce.</small>
                    @if ($errors->has('direccion'))
                    <span class="error text-danger">{{ $errors->first('direccion') }}</span>
                      @endif
                  </div>
                  {{--  --}}
                  <div class="form-row mb-3">
                    <div class="form-group col-md-6">
                      <label for="ciudad">Ciudad</label>
                      <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Ciudad"
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
                      <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado"
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
                      <label for="codigoPostal">Codigo Postal</label>
                      <input type="text" class="form-control" name="codigoPostal" id="codigoPostal" placeholder="Codigo postal"
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
                    <input type="text" class="form-control" name="google" id="google"  placeholder="Link del GoogleMap de la empresa" 
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
                    <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Link del facebook de la empresa" 
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
                    <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Link del instagram de la empresa" 
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
@push('js')
<script>
  var token = $('meta[name="csrf-token"]').attr('content');

  // Enviar datos
  $('#formulario').submit(function(e){
      e.preventDefault(); // Previene el recargo de la página

      var formData = new FormData(this);
        formData.append('foto', $('#foto')[0].files[0]);
        formData.append('nombreEmpresa', $.trim($('#nombreEmpresa').val()));
        formData.append('razonSocial', $.trim($('#razonSocial').val()));
        formData.append('rif', $.trim($('#rif').val()));
        formData.append('correo', $.trim($('#correo').val()));
        formData.append('telefono', $.trim($('#telefono').val()));
        formData.append('direccion', $.trim($('#direccion').val()));
        formData.append('ciudad', $.trim($('#ciudad').val()));
        formData.append('estado', $.trim($('#estado').val()));
        formData.append('codigoPostal', $.trim($('#codigoPostal').val()));
        formData.append('google', $.trim($('#google').val()));
        formData.append('facebook', $.trim($('#facebook').val()));
        formData.append('instagram', $.trim($('#instagram').val()));

          $.ajax({
          url: "{{route('empresa.datos')}}",
          method: 'POST',
          data: formData,
          dataType: 'JSON',
          contentType: false, 
          processData: false,
          cache:false,
          headers: {
              'X-CSRF-TOKEN': token
          },
          success: function(data) {
              if (data.success) {
                  Swal.fire({
                  title: "Registro exitoso",
                  text: "El registro fue almacenado al sistema",
                  icon: "success",
                  timer: 2000,
                  showConfirmButton: false,
                  timerProgressBar: true
                  }); 
          } else {
              Swal.fire({
              title: 'Error registro no almacenado',
              text: "Error en el registro",
              icon: "error",
              timer: 2000,
              showConfirmButton: false,
              timerProgressBar: true
              }); 
          }

          },
          error: function(xhr, status, error) {
          Swal.fire({
              title: "Error en el envio",
              text: "El registro no fue agregado al sistema!!",
              icon: "error"
          });
          }
      });
  });

</script>
@endpush