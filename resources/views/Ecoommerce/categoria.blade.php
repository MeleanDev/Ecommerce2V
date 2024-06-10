@extends('Ecoommerce.layouts.app')

@section('tittle', 'Categorias')

@section('content')

<style>
.banner {
    background-image: url('{{$fotos->secundaria}}');
}
</style>
    <!-- Page Content -->
    <div class="banner">
    </div>
            <!-- Items Starts Here -->
            <div class="featured-page">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="section-heading">
                                <div class="line-dec"></div>
                                <h1>Categorias</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="featured container no-gutter">
                
                <div class="row posts">
                @foreach ($categorias as $item)
                    <div class="item new col-md-4">
                        <a href="{{route('categorias.productos', $item->nombre)}}">
                        <div class="featured-item">
                            <img src="{{ asset($item->foto) }}" height="200" width="200" alt="{{$item->nombre}}">
                            <h4 class="h4 text-center">{{$item->nombre}}</h4>
                        </div>
                        </a>
                    </div>
                @endforeach
                </div>
            </div>
        
            <div class="page-navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            {{$categorias->links('pagination::Bootstrap-4')}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Featred Page Ends Here -->
@endsection