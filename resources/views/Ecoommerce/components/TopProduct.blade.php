<div class="featured-items">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <div class="line-dec"></div>
                    <h1>Productos Destacados</h1>
                </div>
            </div>
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    @if ($productos)
                        @foreach ($productos as $item)
                            <a href="{{$item->codigo}}">
                                <div class="featured-item">
                                    <img src="{{ asset($item->foto) }}" alt="{{$item->nombre}}">
                                    <h4>{{$item->nombre}}</h4>
                                    <h6>${{$item->Precio}}</h6>
                                </div>
                            </a>
                        @endforeach                        
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>