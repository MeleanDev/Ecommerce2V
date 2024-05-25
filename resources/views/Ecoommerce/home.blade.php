@extends('Ecoommerce.layouts.app')

@section('tittle', 'Home')

@section('content')
    <!-- Page Content -->
        <!-- Banner Starts Here -->
        <div class="banner">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="caption">
                    <h2>Ecommerce HTML Template</h2>
                    <div class="line-dec"></div>
                    <p>Pixie HTML Template can be converted into your desired CMS theme. Total <strong>5 pages</strong> included. You can use this Bootstrap v4.1.3 layout for any CMS. 
                    <br><br>Please tell your friends about <a rel="nofollow" href="https://www.facebook.com/tooplate/">Tooplate</a> free template site. Thank you. Photo credit goes to <a rel="nofollow" href="https://www.pexels.com">Pexels website</a>.</p>
                    <div class="main-button">
                    <a href="#">Order Now!</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Banner Ends Here -->
    
        <!-- Featured Starts Here -->
        @include('Ecoommerce.components.TopProduct')
        <!-- Featred Ends Here -->
  
@endsection