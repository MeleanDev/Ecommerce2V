<?php

namespace App\Service;

use App\Service\admin\ConsultasDBClass;

class EcommerceWebClass
{
    private $DB;

    public function __construct(ConsultasDBClass $DB){
        $this->DB = $DB;
    }

    public function categorias(){
        $categoria = $this->DB->obtenerDatosCategoriasPaginate();
        return $categoria;
    }

    public function productos(){
        $datos = $this->DB->productosDatos();
        return $datos;
    }

    public function suscripcion($correo){
        $this->DB->suscripcionWeb($correo);
    }

    public function datosEmpresa(){
        $empresa = $this->DB->obtenerDatosEmpresa();
        return $empresa;
    }

    public function banners(){
        $fotos = $this->DB->bannerDatos();
        return $fotos;
    }

    public function quinesSomos(){
        $datos = $this->DB->quienesSomosInformacion();
        return $datos;
    }

    public function inicio(){
        $datos = $this->DB->inicioDatos();
        return $datos;
    }
}
