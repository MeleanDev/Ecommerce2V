<div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="logo">
            @include('Ecoommerce.components.logo')
          </div>
        </div>
        <div class="col-md-12">
          <div class="footer-menu">
            <ul>
              <li><a href="{{route('inicio')}}">Inicio</a></li>
              <li><a href="{{route('contacto')}}">Ayuda</a></li>
              <li><a href="{{route('quienesSomos')}}">Quienes somos?</a></li>
              <li><a href="{{route('contacto')}}">Contacto</a></li>
              <li><a @include('Ecoommerce.components.Desarrollador')>Desarrollador</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-12">
          <div class="social-icons">
            <ul>
              <li><a href="{{$empresaD->facebook}}"><i class="fa fa-facebook"></i></a></li>
              <li><a href="{{$empresaD->instagram}}"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>