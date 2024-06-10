<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Ecommerce2V - @yield('tittle')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('estilos/Ecoommerce/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('estilos/Ecoommerce/assets/css/tooplate-main.css') }}">
    <link rel="stylesheet" href="{{ asset('estilos/Ecoommerce/assets/css/owl.css') }}">

    <style>
      .float{
      position:fixed;
      width:60px;
      height:60px;
      bottom:40px;
      right:40px;
      background-color:#25d366;
      color:#FFF;
      border-radius:50px;
      text-align:center;
      font-size:30px;
      box-shadow: 2px 2px 3px #999;
      z-index:100;
    }
    .float:hover {
      text-decoration: none;
      color: #25d366;
      background-color:#fff;
    }

    .my-float{
      margin-top:16px;
    }
    </style>
  </head>

  <body>
    
    <!-- Pre Header -->
    @include('Ecoommerce.components.Pre-Header')

    <!-- Navigation -->
    @include('Ecoommerce.components.Navigation')

    <!-- Page Content -->
    @yield('content')

    <!-- Subscribe Form Starts Here -->
    @include('Ecoommerce.components.Subscribe')
    <!-- Subscribe Form Ends Here -->
    
    <!-- Footer Starts Here -->
    @include('Ecoommerce.components.Footer')
    <!-- Footer Ends Here -->

    <!-- Sub Footer Starts Here -->
    @include('Ecoommerce.components.Sub-Footer')
    <!-- Sub Footer Ends Here -->
    <a href="https://api.whatsapp.com/send?phone=+{{$empresaD->telefono}}&text=hola!!%20quiero%20mas%20informaci%C3%B3n%20vengo%20del%20sitioWeb" class="float" target="_blank">
      <i class="fa fa-whatsapp my-float"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('estilos/Ecoommerce/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('estilos/Ecoommerce/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <!-- Additional Scripts -->
    <script src="{{ asset('estilos/Ecoommerce/assets/js/custom.js') }}"></script>
    <script src="{{ asset('estilos/Ecoommerce/assets/js/owl.js') }}"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
