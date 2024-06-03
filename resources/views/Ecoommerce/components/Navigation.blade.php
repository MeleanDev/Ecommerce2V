<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">@include('Ecoommerce.components.logo')</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item @if(Route::currentRouteName() === 'home') active @endif">
            <a class="nav-link" href="{{route('home')}}">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item @if(Route::currentRouteName() === 'products') active @endif">
            <a class="nav-link" href="{{route('products')}}">Productos</a>
          </li>
          <li class="nav-item @if(Route::currentRouteName() === 'about') active @endif">
            <a class="nav-link" href="{{route('about')}}">¿Quienes Somos?</a>
          </li>
          <li class="nav-item @if(Route::currentRouteName() === 'contact') active @endif">
            <a class="nav-link" href="{{route('contact')}}">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>