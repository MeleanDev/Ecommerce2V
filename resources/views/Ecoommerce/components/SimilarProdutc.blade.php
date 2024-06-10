<div class="featured-items">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h1>Misma Categoria</h1>
          </div>
        </div>
        <div class="col-md-12">
          <div class="owl-carousel owl-theme">
            @foreach ($CategoriaMisma as $item)
              <a href="{{ route('productoPublic', ['categoria' => $item->categoria, 'producto' => $item->codigo]) }}">
                <div class="featured-item">
                  <img src="{{$item->fotoURL}}" height="200" width="200">
                  <h4>{{$item->nombre}}</h4>
                  <h6>${{$item->precio}}</h6>
                </div>
              </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>