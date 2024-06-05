@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Quienes Somos - Editar')

{{-- Content body: main page content --}}

{{-- plugins --}}
  {{-- Sweetalert2 --}}
    @section('plugins.Sweetalert2', true)

@section('content_body')
<div class="container">
    {{-- Titulo --}}
    <div class="tittle h1 text-center">
        <h1>Quienes Somos Informacion</h1>
    </div>

    <form id="formulario" enctype="application/x-www-form-urlencoded">
        @csrf
        <div class="form-group">
          <label for="informacion">Informacion para los usuarios</label>
          <textarea class="form-control" id="informacion" name="informacion" rows="5" minlength="10" maxlength="2000" required></textarea>
          <small id="informacion" class="form-text text-muted">Tiene un maximo de 2000 caracteres.</small>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
            <button type="reset" class="btn btn-warning btn-lg">Reiniciar</button>
        </div>
      </form>
</div>
@stop

@push('js')
<script>  
    document.getElementById("informacion").value = "@if ($datos){{$datos->informacion}} @endif";

    var token = $('meta[name="csrf-token"]').attr('content');

    //submit para el Crear y Actualización
  $('#formulario').submit(function(e){
    e.preventDefault(); // Previene el recargo de la página
    informacion = $.trim($('#informacion').val());
    $.ajax({
        url: "{{route('editSomos.editar')}}",
        type: "POST",
        datatype: "json",
        data: {
        _token: token,
        informacion: informacion,
        },
        success: function(data) {
            Swal.fire({
            title: "Informacion Guardada",
            text: "La informacion fue registrada",
            icon: "success"
            });
        },
        error: function(xhr, status, error) {
        Swal.fire({
            title: "Informacion No Guardada",
            text: "La informacion no se registrada!!!",
            icon: "error"
        });
        }
    });
});
    
</script>
@endpush