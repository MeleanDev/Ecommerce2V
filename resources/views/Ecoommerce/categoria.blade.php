@extends('Ecoommerce.layouts.app')

@section('tittle', 'Categorias')

@section('content')
    <!-- Page Content -->
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
                        <a href="{{$item->nombre}}">
                        <div class="featured-item">
                            <img src="{{ asset($item->foto) }}" alt="{{$item->nombre}}">
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
                    <ul>
                        <li class="current-page"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
            <!-- Featred Page Ends Here -->
@endsection