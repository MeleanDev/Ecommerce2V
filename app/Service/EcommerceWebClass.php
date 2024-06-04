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
        
    }

    public function suscripcion($correo){
        $this->DB->suscripcionWeb($correo);
    }

    public function DatosEmpresa(){
        $empresa = $this->DB->obtenerDatosEmpresa();
        return $empresa;
    }
}
