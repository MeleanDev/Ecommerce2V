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
                    <img src="{{$fotos->quienesSomos}}" alt="">
                </div>
                </div>
                <div class="col-md-6">
                <div class="right-content">
                    <h5>{{$empresaD->nombreEmpresa}}</h5>
                    <p>Nuestros datos de contacto:</p>
                    <p> <i class="fa fa-phone"></i> Telefono: {{$empresaD->telefono}}</p>
                    <p> <i class="fa fa-envelope"></i> Correo: {{$empresaD->correo}}</p>
                    <p> <i class="fa fa-address-card"></i> Rif/Cedula: {{$empresaD->rif}}</p>
                    <p> <i class="fa fa-map"></i> estado/ciudad: {{$empresaD->estado}}, {{$empresaD->ciudad}}</p>
                    <p> <i class="fa fa-map-marker"></i> Ubicacion: {{$empresaD->direccion}} {{$empresaD->codigoPostal}}</p>
                    <br><br>
                    <p>{{$datos->informacion}}</p>
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