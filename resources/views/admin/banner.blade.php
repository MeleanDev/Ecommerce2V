@extends('admin.layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Banners - Editar')

{{-- Content body: main page content --}}

@section('content_body')
<div class="container">
    @include('admin.componts.alert')
    {{-- Titulo --}}
    <div class="tittle h1 text-center">
        <h1>Banners de la Web</h1>
    </div>

    

</div>
@stop

@push('js')
    <script> 
    
    
    </script>
@endpush