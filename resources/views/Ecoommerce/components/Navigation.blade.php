<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="{{ asset('build/Ecoommerce/assets/images/header-logo.png') }}" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item @if(Route::currentRouteName() === 'home') active @endif">
            <a class="nav-link" href="{{route('home')}}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item @if(Route::currentRouteName() === 'products') active @endif">
            <a class="nav-link" href="{{route('products')}}">Products</a>
          </li>
          <li class="nav-item @if(Route::currentRouteName() === 'about') active @endif">
            <a class="nav-link" href="{{route('about')}}">About Us</a>
          </li>
          <li class="nav-item @if(Route::currentRouteName() === 'contact') active @endif">
            <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>