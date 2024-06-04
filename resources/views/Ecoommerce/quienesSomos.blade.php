@extends('Ecoommerce.layouts.app')

@section('tittle', 'Quienes Somos')

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
                    <h5>{{$empresaD->nombreEmpresa}}</h5>
                    <p>Nuestros datos de contacto:</p>
                    <p>Telefono: {{$empresaD->telefono}}</p>
                    <p>Correo: {{$empresaD->correo}}</p>
                    <p>Rif/Cedula: {{$empresaD->rif}}</p>
                    <p>estado/ciudad: {{$empresaD->estado}}, {{$empresaD->ciudad}}</p>
                    <p>Ubicacion: {{$empresaD->direccion}} {{$empresaD->codigoPostal}}</p>
                    <br><br>
                    <p>ESCRIBIR MENSAJE AQUI SOBRE NOSOSTROS!!!</p>
                    <div class="share">
                    <h6>Encuéntranos en: <span><a href="{{$empresaD->facebook}}"><i class="fa fa-facebook"></i></a><a href="{{$empresaD->instagram}}"><i class="fa fa-instagram"></i></a></span></h6>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- About Page Ends Here -->
@endsection