@extends('Ecoommerce.layouts.app')

@section('tittle', 'contacto')

@section('content')
<style>
    .banner {
        background-image: url('{{$fotos->secundaria}}');
    }
</style>
    <!-- Page Content -->
    <div class="banner">
    </div>
        <!-- About Page Starts Here -->
        <div class="contact-page">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="section-heading">
                    <div class="line-dec"></div>
                    <h1>Contáctenos</h1>
                </div>
                </div>
                <div class="col-md-6">
                <div id="map">
                        <!-- How to change your own map point
                                1. Go to Google Maps
                                2. Click on your location point
                                3. Click "Share" and choose "Embed map" tab
                                4. Copy only URL and paste it within the src="" field below
                        -->
    
                    <iframe src="{{$empresaD->google}}" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                </div>
                <div class="col-md-6">
                <div class="right-content">
                    <div class="container">
                    <form id="contact" action="" method="post">
                        <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Nombre y apellido..." required="">
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                            <input name="email" type="text" class="form-control" id="email" placeholder="Correo electronico..." required="">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                            <input name="subject" type="text" class="form-control" id="subject" placeholder="Razon..." required="">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                            <textarea name="message" rows="6" class="form-control" id="message" placeholder="Tu mensaje..." required=""></textarea>
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                            <button type="submit" id="form-submit" class="button">Enviar Mensaje</button>
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <div class="share">
                                <h6>Encuéntranos en: <span><a href="{{$empresaD->facebook}}"><i class="fa fa-facebook"></i></a><a href="{{$empresaD->instagram}}"><i class="fa fa-instagram"></i></a></span></h6>
                            </div>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- About Page Ends Here -->
@endsection

