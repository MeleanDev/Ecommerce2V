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