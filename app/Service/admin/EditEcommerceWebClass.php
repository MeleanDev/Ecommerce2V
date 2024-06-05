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
            $datos = $this->DB->inicioDatos();
            return $datos;
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