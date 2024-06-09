<?php

namespace App\Service\admin;

class DasboardClass
{
    private $DB;

    public function __construct(ConsultasDBClass $DB){
        $this->DB = $DB;
    }

    public function suscritosCount(){
        $datos = $this->DB->suscritosCount();
        return $datos;
    }

    public function categoriaCount(){
        $datos = $this->DB->obtenerDatosCategoriasCount();
        return $datos;
    }

    public function productosCount(){
        $datos = $this->DB->obtenerDatosProductosCount();
        return $datos;
    }
}
