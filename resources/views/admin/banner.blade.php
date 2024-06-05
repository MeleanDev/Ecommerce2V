@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Banners - Editar')

{{-- Content body: main page content --}}

@section('content_body')
<div class="container text-center">
    @include('admin.componts.alert')
    {{-- Titulo --}}
    <div class="tittle h1 text-center mb-4">
        <h1>Banners de la Web</h1>
    </div>
    <div class="banners primario">
        <form action="{{route('editBanner.editar')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="editar" value="1">
            <img src="{{ asset($datos->primaria) }}" class="img-fluid" alt="foto">
            <h4 class="mb-2 text-center">Banners de modulo inicio</h4>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">Cargar</span>
                </div>
                <div class="custom-file">
                <input type="file" class="custom-file-input" id="primaria" name="foto" required accept=".jpg,.png">
                <label class="custom-file-label" for="primaria">Seleccionar archivo</label>
                </div>
            </div>
            <small class="form-text text-muted">Se recomienda unas Dimensiones de 1600 x 550</small>
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Cargar imagen</button>
            </div>
        </form>
    </div>
    <hr>
    <div class="banners secundario">
        <form action="{{route('editBanner.editar')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="editar" value="2">
            <img src="{{ asset($datos->secundaria) }}" class="img-fluid" alt="foto">
            <h4 class="mb-2 text-center">Banners Secundario</h4>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">Cargar</span>
                </div>
                <div class="custom-file">
                <input type="file" class="custom-file-input" id="secundaria" name="foto" required accept=".jpg,.png">
                <label class="custom-file-label" for="primaria">Seleccionar archivo</label>
                </div>
            </div>
            <small class="form-text text-muted">Se recomienda unas Dimensiones 2765x653</small>
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Cargar imagen</button>
            </div>
        </form>
    </div>
    <hr>
    <div class="banners quinesSomos">
        <form action="{{route('editBanner.editar')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="editar" value="3">
            <img src="{{ asset($datos->quienesSomos) }}" class="img-fluid" alt="foto">
            <h4 class="mb-2 text-center">Banners de modulo Quienes Somos</h4>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">Cargar</span>
                </div>
                <div class="custom-file">
                <input type="file" class="custom-file-input" id="quienesSomos" name="foto" required accept=".jpg,.png">
                <label class="custom-file-label" for="primaria">Seleccionar archivo</label>
                </div>
            </div>
            <small class="form-text text-muted">Se recomienda unas Dimensiones de 570x535</small>
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Cargar imagen</button>
            </div>
        </form>
    </div>
</div>
@stop

@push('js')
    <script> 
    
    
    </script>
@endpush