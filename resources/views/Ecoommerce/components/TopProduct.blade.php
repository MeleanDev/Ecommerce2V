<div class="featured-items">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <div class="line-dec"></div>
                    <h1>Ultimos Productos Agregados</h1>
                </div>
            </div>
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    @if ($productos)
                        @foreach ($productos as $item)
                            <a href="{{ route('productoPublic', ['categoria' => $item->categoria, 'producto' => $item->codigo]) }}">
                                <div class="featured-item">
                                    <img src="{{ asset($item->foto) }}" height="200" width="200" alt="{{$item->nombre}}">
                                    <h4>{{$item->nombre}}</h4>
                                    <p>Categoria: {{$item->categoria}}</p>
                                    <h6>${{$item->precio}}</h6>
                                </div>
                            </a>
                        @endforeach                        
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>