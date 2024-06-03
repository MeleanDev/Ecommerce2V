@extends('Ecoommerce.layouts.app')

@section('tittle', 'about')

@section('content')
    <!-- Page Content -->
        <!-- About Page Starts Here -->
        <div class="about-page">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="section-heading">
                    <div class="line-dec"></div>
                    <h1>Sobre nosotros</h1>
                </div>
                </div>
                <div class="col-md-6">
                <div class="left-image">
                    <img src="{{ asset('build/Ecoommerce/assets/images/about-us.jpg') }}" alt="">
                </div>
                </div>
                <div class="col-md-6">
                <div class="right-content">
                    <h4>Poner Mensaje Aqui!</h4>
                    <p>Poner Mensaje Aqui!.</p>
                    <div class="share">
                    <h6>Encuéntranos en: <span><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-instagram"></i></a></span></h6>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- About Page Ends Here -->
@endsection