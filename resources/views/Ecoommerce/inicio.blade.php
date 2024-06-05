@extends('Ecoommerce.layouts.app')

@section('tittle', 'Inicio')

@section('content')

<style>
    .banner {
        background-image: url('{{$fotos->primaria}}');
    }
    </style>
    <!-- Page Content -->
        <!-- Banner Starts Here -->
        <div class="banner">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="caption">
                    <h2>{{$empresaD->nombreEmpresa}}</h2>
                    <div class="line-dec"></div>
                    <p>{{$inicioInfo->informacion}}.</p>
                    <div class="main-button">
                    <a href="{{route('categorias')}}">Buscar Productos!</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Banner Ends Here -->
    
        <!-- Featured Starts Here -->
        @include('Ecoommerce.components.TopProduct')
        <!-- Featred Ends Here -->
  
@endsection