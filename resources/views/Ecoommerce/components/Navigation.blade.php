<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">@include('Ecoommerce.components.logo')</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item @if(Route::currentRouteName() === 'inicio') active @endif">
            <a class="nav-link" href="{{route('inicio')}}">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item @if(Route::currentRouteName() === 'categorias') active @endif">
            <a class="nav-link" href="{{route('categorias')}}">Productos</a>
          </li>
          <li class="nav-item @if(Route::currentRouteName() === 'quienesSomos') active @endif">
            <a class="nav-link" href="{{route('quienesSomos')}}">¿Quienes Somos?</a>
          </li>
          <li class="nav-item @if(Route::currentRouteName() === 'contacto') active @endif">
            <a class="nav-link" href="{{route('contacto')}}">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>