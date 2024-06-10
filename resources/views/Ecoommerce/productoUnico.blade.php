@extends('Ecoommerce.layouts.app')

@section('tittle', 'Producto Unico')

@section('content')
    <!-- Page Content -->
    <!-- Single Starts Here -->
    <div class="single-product">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <div class="line-dec"></div>
                <h1>Producto Unico</h1>
              </div>
            </div>
            <div class="col-lg">
              <img src="{{$producto->fotoURL}}" class="img-fluid" width="530" height="370">
            </div>
            <div class="col">
              <div class="right-content">
                <h4>{{$producto->nombre}}</h4>
                <h6>${{$producto->precio}}</h6>
                <p>{{$producto->descripcion}}</p>
                <span>Disponibles: {{$producto->cantidad}}</span>
                <br>
                <a href="https://api.whatsapp.com/send?phone={{$empresaD->telefono}}&text=Quiero%20mas%20informacion%20del%20siguiente%20producto%20Codigo%20{{$producto->codigo}}" class="btn btn-primary" target="_blank">
                  Ordenar ahora!!
                </a>
                <div class="down-content">
                  <div class="categories">
                    <h6>Categoria: <span><a href="{{route('categorias.productos', $producto->categoria)}}">{{$producto->categoria}}</a></span></h6>
                  </div>
                  <div class="share">
                    <h6>Encuéntranos en: <span><a href="{{$empresaD->facebook}}"><i class="fa fa-facebook"></i></a><a href="{{$empresaD->instagramD}}"><i class="fa fa-instagram"></i></a></span></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Single Page Ends Here -->
  
  
      <!-- Similar Starts Here -->
      @include('Ecoommerce.components.SimilarProdutc')
      <!-- Similar Ends Here -->
@endsection