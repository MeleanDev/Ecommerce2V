<?php

namespace App\Service\admin;

class SuscritoWebClass
{
    private $DB;

    public function __construct(ConsultasDBClass $DB){
        $this->DB = $DB;
    }

    public function lista(){
        $datos = $this->DB->suscritosList();
        return $datos;
    }

    public function borrarTodo(){
        $datos = $this->DB->suscritosBorrarTodo();
        return $datos;
    }
}
