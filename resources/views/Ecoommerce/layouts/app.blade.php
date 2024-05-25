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
    <link href="{{ asset('build/Ecoommerce/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('build/Ecoommerce/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('build/Ecoommerce/assets/css/tooplate-main.css') }}">
    <link rel="stylesheet" href="{{ asset('build/Ecoommerce/assets/css/owl.css') }}">

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


    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('build/Ecoommerce/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('build/Ecoommerce/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <!-- Additional Scripts -->
    <script src="{{ asset('build/Ecoommerce/assets/js/custom.js') }}"></script>
    <script src="{{ asset('build/Ecoommerce/assets/js/owl.js') }}"></script>


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
