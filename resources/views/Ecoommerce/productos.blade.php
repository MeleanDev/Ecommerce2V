@extends('Ecoommerce.layouts.app')

@section('tittle', 'Productos')

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
                                <h1>Categoria {{$categoria}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="featured container no-gutter">
                
                <div class="row posts">
                    @foreach ($productos as $item)
                        <div id="{{$item->id}}" class="item new col-md-4">
                            <a href="{{ route('productoPublic', ['categoria' => $item->categoria, 'producto' => $item->codigo]) }}">
                            <div class="featured-item">
                                <img src="{{$item->fotoURL}}" height="200" width="200" alt="{{$item->nombre}}">
                                <h4>{{$item->nombre}}</h4>
                                <h6>${{$item->precio}}</h6>
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
                    <ul>
                        {{$productos->links('pagination::Bootstrap-4')}}
                    </ul>
                    </div>
                </div>
                </div>
            </div>
            <!-- Featred Page Ends Here -->
@endsection