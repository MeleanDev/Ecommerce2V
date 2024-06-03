@extends('Ecoommerce.layouts.app')

@section('tittle', 'Home')

@section('content')
    <!-- Page Content -->
        <!-- Banner Starts Here -->
        <div class="banner">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="caption">
                    <h2>Poner Mensaje aqui</h2>
                    <div class="line-dec"></div>
                    <p>Poner Mensaje AA.</p>
                    <div class="main-button">
                    <a href="{{route('products')}}">Buscar Productos!</a>
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