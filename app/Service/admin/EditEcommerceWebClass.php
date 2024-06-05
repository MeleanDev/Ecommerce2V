<?php

namespace App\Service\admin;

class EditEcommerceWebClass
{
    private $DB;

    public function __construct(ConsultasDBClass $DB){
        $this->DB = $DB;
    }

    // Inicio
        public function inicioDatos(){
            $datos = $this->DB->inicioDatos();
            return $datos;
        }

        public function inicioGuardar($datos){
            $this->DB->inicioGuardar($datos);
        }

        public function inicioEliminar(){
            $this->DB->inicioEliminar();
        }

    // Banners
        public function bannerDatos(){
            $datos = $this->DB->bannerDatos();
            return $datos;
        }

        // Cambiamos en nombre Primaria
        public function guardarBannerPrimaria($nombre){
            $this->DB->editarBannerPrimaria($nombre);
        }

        // Cambiamos en nombre Secundaria
        public function guardarBannerSecundaria($nombre){
            $this->DB->editarBannerSecundaria($nombre);
        }

        // Cambiamos en nombre QueSomos
        public function guardarbannerQueSomos($nombre){
            $this->DB->editarBannerQueSomos($nombre);
        }

        // Nombre de la img
        public function nombreImagen($datos){
            $filename = time().'.'.$datos->foto->extension();
            $datos->foto->move(public_path('empresa/banners'), $filename);

            $nombreActualizado = 'empresa/banners/'.$filename;
            return $nombreActualizado;
        }

        // Eliminar Foto anterior
        public function eliminarFotoCarpt($fotoAnterior){
            $this->DB->eliminarFotoCarpt($fotoAnterior);
        }

    // Quienes Somos
        public function quinesSomosDatos(){
            $datos = $this->DB->quienesSomosInformacion();
            return $datos;
        }

        public function quinesSomosGuardar($datos){
            $this->DB->QuinesSomosGuardar($datos);
        }

        public function quinesSomosEliminar(){
            $this->DB->quinesSomosEliminar();
        }
}